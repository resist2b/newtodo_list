<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_M');
    }

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
        $lists['users'] = $this->User_M->get_all();
        $app['app_title'] = "Users";
        $this->load->view('layouts/header', $app);
        $this->load->view('users/show_users', $lists);
        $this->load->view('layouts/footer');
    }

    public function add_new_user() {
        $app['app_title'] = "Add New User";
        //get $lists
        //load form & passing $lists
        $this->load->view('layouts/header', $app);
        $this->load->view('users/add_user');
        $this->load->view('layouts/footer');
    }

    public function save_new_user() {
        $data = [
            'first_name' => htmlspecialchars($this->input->post('first_name')),
            'last_name' => htmlspecialchars($this->input->post('last_name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => htmlspecialchars(md5($this->input->post('password'))),
            'is_admin' => htmlspecialchars($this->input->post('is_admin')),
            'reg_date' => date('Y-m-d H:i:s'),
        ];

        $this->load->model('User_M');
        $this->User_M->insert($data);
        redirect('users/');
    }

    public function data() {
        $data['app_title'] = "New To-Do";
        return $data;
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]|min_length[4]|xxs_claen');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[4]|md5');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('reg/header', $this->data());
            $this->load->view('reg/login', $this->data());
            $this->load->view('reg/footer', $this->data());
        } else {
            $query = $this->User_M->get_by(['username' => $this->input->post('username'), 'password' => $this->input->post('password')]);
            if (!($query)) {
                echo "Sorry, The Username and password you entered don't match.";
            } else {
                $this->set_session();
                redirect(base_url('home/dashboard/'));
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
        return $user_data;
    }

    public function unset_session() {
        $user_data = $this->query();
        $this->session->unset_userdata($user_data);
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
        $this->form_validation->set_rules('first_name', 'first_name', 'trim|required|max_length[50]|min_length[5]|xxs_claen');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|max_length[50]|min_length[5]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'username', 'trim|required|max_length[50]|min_length[5]|is_unique[users.username]|xxs_claen');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[5]|xxs_claen');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'trim|required|max_length[50]|min_length[5]|xxs_claen||matches[password]');
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
