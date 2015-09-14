<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('africa/cairo');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (empty($this->session->userdata('first_name'))) {
            redirect(base_url());
        }
        $this->load->model('Task_M');
    }

    public function index() {
        $this->show_all();
    }

    public function show_all() {
//        $this->load->model('Task_M');
//        $tasks['tasks'] = $this->Task_M->get_all();

        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where('user_id',$this->session->userdata('id'));
        $this->db->join('lists', 'lists.id = tasks.list_id');
        $tasks['tasks'] = $this->db->get()->result();
        $app['app_title'] = "Tasks";
        $this->load->view('layouts/header', $app);
        $this->load->view('tasks/show_all', $tasks);
        $this->load->view('layouts/footer');
    }

    public function add_new_task() {
        $app['app_title'] = "Add New Task";
        //get $lists
//        $this->load->model('list_M');
//        $lists['lists'] = $this->list_M->get_all();
        
         $this->db->select('*');
        $this->db->from('lists');
        $this->db->where('list_user_id',$this->session->userdata('id'));
        $lists['lists'] = $this->db->get()->result();

        //load form & passing $lists
        $this->load->view('layouts/header', $app);
        $this->load->view('tasks/add_task', $lists);
        $this->load->view('layouts/footer');
    }

    public function save_task() {
        $data = [
            'task_name' => $this->input->post('task_name'),
            'task_body' => $this->input->post('task_body'),
            'list_id' => $this->input->post('list_id'),
            'due_date' => $this->input->post('due_date'),
            'user_id' => $this->session->userdata('id'),
            'create_date' => date('Y-m-d H:i:s')
        ];
        $this->Task_M->insert($data);
        redirect('tasks/');
    }

}
