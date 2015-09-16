<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Africa/Cairo');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public $app = "Moataz TODO List";

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
        /* preparing phase */
        $this->app.= " | Tasks";
        $app['app_title'] = $this->app;
        $app['page_title'] = "Tasks";
        $id = $this->session->userdata('id');

        /* Get data from 3 tables using join */
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->join('users', 'tasks.user_id = users.id');
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $this->db->where('tasks.user_id', $id);
        $data['tasks'] = $this->db->get()->result();

//load views
        $this->load->view('layouts/header', $app);
        $this->load->view('tasks/show_tasks', $data);
        $this->load->view('layouts/footer');
    }

    public function edit() {
        /* preparing phase */
        
         $this->app.= " | Edit Task";
        $app['app_title'] = $this->app;
        $app['page_title'] = "Edit task";
        $id = $this->input->post('task_id');

        /* Get all lists */
        $data['lists'] = $this->Task_M->get_lists();
        /* Get all data about this taks 
         * i want to replace this code with CRUD One :)
         */
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where('tasks.task_id', $id);
        $this->db->join('lists', 'tasks.list_id = lists.id');
        $data['task'] = $this->db->get()->result();
        $data['task'] = $data['task'][0];

        /* load views */
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
                /* i want to create update_date */
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
        $this->app.= " | Add task";
        $app['app_title'] = $this->app;
        $app['page_title'] = "Add task";

        $id = $this->session->userdata('id');

        /* Get lists of Current user order_by('id','DESC')
         */
        $this->load->model('List_M');
        $this->List_M->order_by('id', 'DESC');
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
            'create_date' => date('Y-m-d h:i:s')
        ];
        $this->Task_M->insert($data);
        redirect('tasks/');
    }

}
