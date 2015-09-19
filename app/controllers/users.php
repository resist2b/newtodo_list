<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller {

    public function index() {
        if (!($this->session->userdata('is_admin')) && $this->session->userdata('is_admin') != 1) {
            redirect(base_url());
        }
        $this->show_all();
    }

    public function show_all() {
        if (!($this->session->userdata('is_admin')) && $this->session->userdata('is_admin') != 1) {
            redirect(base_url());
        }

        $this->data['users'] = $this->User_M->get_all();
        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('users/show_users', $this->data);
        $this->load->view('layouts/footer');
    }

    public function profile() {
        $user_id = $this->session->userdata('id');
        /* Get data from 3 tables using join */
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.id', $user_id);
        $this->data['users'] = $this->db->get()->result();

        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('users/user', $this->data);
        $this->load->view('layouts/footer');
    }

    public function add_new_user() {

        //get $lists
        //load form & passing $lists
        $this->load->view('layouts/header', $this->data);
        $this->load->view('users/user');
        $this->load->view('layouts/footer');
    }

    public function saveUser() {
        $this->data = [
            'first_name' => htmlspecialchars($this->input->post('first_name')),
            'last_name' => htmlspecialchars($this->input->post('last_name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => htmlspecialchars(md5($this->input->post('password'))),
            'is_admin' => htmlspecialchars($this->input->post('is_admin')),
            'reg_date' => date('Y-m-d H:i:s'),
        ];

        $this->load->model('User_M');
        $this->User_M->insert($this->data);
        redirect('users/');
    }

    public function updateUser() {

        /* 1.validate */

        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'first_name', 'required|strip_tagstrim|xxs_claen|max_length[50]|min_length[4]');
        $this->form_validation->set_rules('last_name', 'last_name', 'required|strip_tagstrim|xxs_claen');
        $this->form_validation->set_rules('email', 'email', 'required|strip_tagstrim|xxs_claen|trim|max_length[50]|min_length[8]|valid_email');
        $this->form_validation->set_rules('username', 'username', 'required|strip_tagstrim|xxs_claen|trim|max_length[50]|min_length[5]|xxs_claen');
        $this->form_validation->set_rules('password', 'Password', 'strip_tagstrim|xxs_claen|max_length[50]|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'strip_tagstrim|xxs_claen|trim|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->profile();
        } else {
            /* update */
            $data = [
                'first_name' => htmlspecialchars($this->input->post('first_name')),
                'last_name' => htmlspecialchars($this->input->post('last_name')),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => htmlspecialchars(md5($this->input->post('password'))),
            ];

            $this->load->model('User_M');
            $this->User_M->update($user_id = $this->session->userdata('id'), $data);
            redirect('users/profile');
        }
    }

    public function data() {
        return $this->data;
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xxs_claen');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xxs_claen|md5');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('reg/header', $this->data());
            $this->load->view('reg/login', $this->data());
            $this->load->view('reg/footer', $this->data());
        } else {
            $query = $this->User_M->get_by(['username' => $this->input->post('username'), 'password' => $this->input->post('password')]);
            if (!($query)) {
                redirect(base_url());
            } else {
                $this->set_session();
                redirect(base_url('home/'));
            }
        }
    }

    public function query() {
        $query = $this->User_M->get_by(['username' => $this->input->post('username'), 'password' => $this->input->post('password')]);



        return $query;
    }

    public function set_session() {
        $query = $this->query();
        $user_data = [
            'id' => $query->id,
            'first_name' => $query->first_name,
            'last_name' => $query->last_name,
            'email' => $query->email,
            'username' => $query->username,
            'password' => $query->password,
            'reg_date' => $query->reg_date,
            'is_admin' => $query->is_admin,
        ];
        $this->session->set_userdata($user_data);
    }

    public function unset_session() {
        $this->session->unset_userdata($this->query());
    }

    public function logout() {
        $this->unset_session();
        redirect(base_url());
    }

    public function reg_form() {
        $this->load->view('reg/header', $this->data());
        $this->load->view('reg/reg', $this->data());
        $this->load->view('reg/footer', $this->data());
    }

    public function chech_reg() {
        $this->form_validation->set_rules('first_name', 'first_name', 'strip_tagstrim|xxs_claen|trim|required|max_length[50]|min_length[5]|xxs_claen');
        $this->form_validation->set_rules('last_name', 'last_name', 'strip_tagstrim|xxs_claen|required');
        $this->form_validation->set_rules('email', 'email', 'strip_tagstrim|xxs_claen|trim|required|max_length[50]|min_length[5]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'username', 'strip_tagstrim|xxs_claen|trim|required|max_length[50]|min_length[5]|is_unique[users.username]|xxs_claen');
        $this->form_validation->set_rules('password', 'Password', 'strip_tagstrim|xxs_claen|required|max_length[50]|min_length[5]|xxs_claen');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'strip_tagstrim|xxs_claen|trim|required|max_length[50]|min_length[5]|xxs_claen||matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('reg/header', $this->data());
            $this->load->view('reg/reg', $this->data());
            $this->load->view('reg/footer', $this->data());
        } else {
            $this->load->model('User_M');
            $this->User_M->save_user();
        }
    }

}
