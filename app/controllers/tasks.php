<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Africa/Cairo');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public function __construct() {


        parent::__construct();
        if (!($this->session->userdata('first_name'))) {
            redirect(base_url());
        }
        $this->load->model('Task_M');
    }

    public function index() {
        $this->show_all();
    }

    public function show() {
        echo __METHOD__;
        echo 'edit task >> switch it to completed,change completion percentage';
    }

    public function show_all() {
//        $this->load->model('Task_M');
//        $tasks['tasks'] = $this->Task_M->get_all();

        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->join('lists', 'lists.id = tasks.list_id');
        $this->db->group_by('`tasks`.`task_id`');
        $tasks['tasks'] = $this->db->get()->result();
        $app['app_title'] = "Tasks";
        $this->load->view('layouts/header', $app);
        $this->load->view('tasks/show_tasks', $tasks);
        $this->load->view('layouts/footer');
    }

    public function edit() {

        /* get current task-> $data['task']
         * get all lists-> $data['lists']
         * get current task list-> $data['task_list']
         */

        /* preparing phase */
        $id = $this->input->post('task_id');
        $app['app_title'] = "Edit Task";
        /* 1.Get Current Task  | Short Code using CRUD  */
        $data['task'] = $this->Task_M->get_by('`task_id` ', $id);

        /* 2.Get all lists | Short Code using CRUD */
        $data['lists'] = $this->Task_M->get_lists();

        /* 3.Get list_name of Current Task  | Short Code using CRUD  */
        foreach ($data['lists'] as $list) {
            if (($list->id) == ($data['task']->list_id)) {
                $data['task_list_id'] = $list->id;
            }
        }
        //load views
        $this->load->view('layouts/header', $app);
        $this->load->view('tasks/edit_task', $data);
        $this->load->view('layouts/footer');
    }

    public function updata() {

        $data = [
            'task_name' => htmlspecialchars($this->input->post('task_name')),
            'task_body' => htmlspecialchars($this->input->post('task_body')),
            'list_id' => htmlspecialchars($this->input->post('list_id')),
            'due_date' => htmlspecialchars($this->input->post('due_date')),
            'progressbar' => htmlspecialchars($this->input->post('progressbar')),
//            'update_date' => date('Y-m-d H:i:s')
        ];

        $this->Task_M->update($this->input->post('task_id'), $data);
        redirect('tasks');
    }

    public function delete() {
        $this->Task_M->delete($this->input->post('task_id'));
        redirect('tasks');
    }

    public function add_new_task() {
        $app['app_title'] = "Add New Task";
        $id = $this->session->userdata('id');

        /* Get lists of Current user */
        $this->load->model('List_M');
        $data['lists'] = $this->List_M->get_many_by('`list_user_id` ', $id);

        /* load form & passing $lists */
        $this->load->view('layouts/header', $app);
        $this->load->view('tasks/add_task', $data);
        $this->load->view('layouts/footer');
    }

    public function save_task() {
        $data = [
            'task_name' => htmlspecialchars($this->input->post('task_name')),
            'task_body' => htmlspecialchars($this->input->post('task_body')),
            'list_id' => htmlspecialchars($this->input->post('list_id')),
            'due_date' => htmlspecialchars($this->input->post('due_date')),
            'user_id' => htmlspecialchars($this->session->userdata('id')),
            'create_date' => date('Y-m-d H:i:s')
        ];
        $this->Task_M->insert($data);
        redirect('tasks/');
    }

}
