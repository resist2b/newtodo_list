<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lists extends CI_Controller {

    public $app = "Moataz TODO List";

    public function __construct() {
        parent::__construct();
        if (!($this->session->userdata('first_name'))) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->show_all();
    }

    public function show_all() {
        $this->app.= " | Lists";
        $app['app_title'] = $this->app;
        $app['page_title'] = "Lists";

        $this->db->from('lists');
//        $this->db->join('users', 'lists.list_user_id = users.id');
        $this->db->join('tasks', 'lists.id = tasks.list_id', 'left');
        $this->db->where('list_user_id', $this->session->userdata('id'));
        $this->db->group_by('lists.id');
        $lists['lists'] = $this->db->get()->result();
        $this->load->view('layouts/header', $app);
        $this->load->view('lists/show_lists', $lists);
        $this->load->view('layouts/footer');
    }

    public function add_new_list() {
        $this->app.= " | Add List";
        $app['app_title'] = $this->app;
        $app['page_title'] = "Add List";
        //get $lists
        //load form & passing $lists
        $this->load->view('layouts/header', $app);
        $this->load->view('lists/add_list');
        $this->load->view('layouts/footer');
    }

    public function validation_list() {
        $this->form_validation->set_rules('list_name', 'list_name', 'strip_tagstrim|xxs_claen|trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('list_body', 'list_body', 'strip_tagstrim|xxs_claen|trim|required|min_length[5]|xss_clean');

        if ($this->form_validation->run() == true) {
            redirect($this->save_list());
        } else {
//            $this->load->view('form_validation');
            echo 'cannot save list';
        }
    }

    public function save_list() {

        $data = [
            'list_name' => htmlspecialchars($this->input->post('list_name')),
            'list_body' => htmlspecialchars($this->input->post('list_body')),
            'create_date' => htmlspecialchars(date('Y-m-d H:i:s')),
            'list_user_id' => $this->session->userdata('id')
        ];


        $this->load->model('List_M');
        $this->List_M->insert($data);


        /* conditional redirect 
         * if i add new list after page refresh my new list be in front of all lists :)
         */
        if ($this->input->post('send_from') == 'tasks/add_new_task') {
            redirect($this->input->post('send_from'));
        }
        redirect('lists/');
    }

    public function delete($id) {
        $id = $this->uri->slash_segment(3);
        $this->load->model('List_M');
        $this->List_M->delete($id);
        redirect('lists');
    }

}
