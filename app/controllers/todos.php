<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Todos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!($this->session->userdata('first_name'))) {
            redirect(base_url());
        }
    }

    public function index() {
        parent::pendingTodos();
    }

    public function action() {
        if ($this->input->post('action') == 'void') {
            $this->data = ['is_voided' => 1];
            $this->Todo_M->update($this->input->post('todo_id'), $this->data);
            redirect('');
        } elseif ($this->input->post('action') == 'un_void') {
            $this->data = ['is_voided' => 0];
            $this->Todo_M->update($this->input->post('todo_id'), $this->data);
            redirect('');
        } elseif ($this->input->post('action') == 'edit') {
            $this->edit();
        } elseif ($this->input->post('action') == 'done') {
            $this->data = ['is_complete' => 1];
            $this->Todo_M->update($this->input->post('todo_id'), $this->data);
            redirect('');
        } elseif ($this->input->post('action') == 'un_done') {
            $this->data = ['is_complete' => 0];
            $this->Todo_M->update($this->input->post('todo_id'), $this->data);
            redirect('');
        }
    }

    public function show_all() {
        /* preparing phase */
        $this->data['page_title'] = "TODOs";

        $this->data['todos'] = $this->get_todos()->result();
        $this->data['todos_num_rows'] = $this->get_todos()->num_rows();

        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('todos/show_todos', $this->data);
        $this->load->view('layouts/footer');
    }

    public function Done_TODOs() {
        /* preparing phase */
        $this->data['page_title'] = "Done TODOs";
        /* get_Done_TODOs  */
        $this->data['todos'] = $this->get_Done_TODOs()->result();
        $this->data['todos_num_rows'] = $this->get_Done_TODOs()->num_rows();

        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('todos/show_todos', $this->data);
        $this->load->view('layouts/footer');
    }

    public function Voided_TODOs() {
        $this->data['page_title'] = "Voided TODOs";
        $this->data['todos'] = $this->get_Voided_TODOs()->result();
        $this->data['todos_num_rows'] = $this->get_Voided_TODOs()->num_rows();

        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('todos/show_todos', $this->data);
        $this->load->view('layouts/footer');
    }

    public function show_category_todos() {
        $this->data['todos'] = $this->get_category_todos()->result();
        $this->data['todos_num_rows'] = $this->get_category_todos()->num_rows();


        if (!$this->data['todos']) {
            redirect(base_url());
        } else {
            $this->data['page_title'] = $this->get_category_todos()->result()[0]->category_name;
        }
        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('todos/show_todos', $this->data);
        $this->load->view('layouts/footer');
    }

    public function edit() {
        /* preparing phase */

        $this->data['page_title'] = "Edit todo";
        $id = $this->input->post('todo_id');
        $user_id = $this->session->userdata('id');

        /* Get current User categories */
        $this->data['categories'] = $this->db->get_where('categories', array('category_user_id' => $user_id))->result();

        /* Get all data about this taks 
         * i want to replace this code with CRUD One :)
         */
        $this->db->select('*');
        $this->db->from('todos');
        $this->db->join('categories', 'todos.category_id = categories.id');
        $this->db->where('todos.todo_id', $id);
        $this->db->where('todos.user_id', $user_id);
        $this->data['todo'] = $this->db->get()->result();
        $this->data['todo'] = $this->data['todo'][0];




        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('todos/edit_todo', $this->data);
        $this->load->view('layouts/footer');
    }


    public function updata() {

        $this->data = [
            'todo_name' => htmlspecialchars($this->input->post('todo_name')),
            'todo_body' => htmlspecialchars($this->input->post('todo_body')),
            'category_id' => htmlspecialchars($this->input->post('category_id')),
            'due_date' => htmlspecialchars($this->input->post('due_date')),
            'progressbar' => htmlspecialchars($this->input->post('progressbar')),
                /* i want to create update_date */
//            'update_date' => date('Y-m-d H:i:s')
        ];

        $this->Todo_M->update($this->input->post('todo_id'), $this->data);
        redirect('todos');
    }

    public function delete() {
        $this->Todo_M->delete($this->input->post('todo_id'));
        redirect('todos');
    }

    public function add_new_todo() {
        $this->data['page_title'] = "Add todo";


        $id = $this->session->userdata('id');

        /* Get categories of Current user order_by('id','DESC')
         */
        $this->load->model('Category_M');
        $this->Category_M->order_by('id', 'DESC');
        $this->data['categories'] = $this->Category_M->get_many_by('`category_user_id` ', $id);


        /* load form & passing $categories */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('todos/add_todo', $this->data);
        $this->load->view('layouts/footer');
    }

    public function save_todo() {
        $this->data = [
            'todo_name' => htmlspecialchars($this->input->post('todo_name')),
            'todo_body' => htmlspecialchars($this->input->post('todo_body')),
            'category_id' => htmlspecialchars($this->input->post('category_id')),
            'due_date' => htmlspecialchars($this->input->post('due_date')),
            'user_id' => htmlspecialchars($this->session->userdata('id')),
            'create_date' => $this->timestamp
        ];
        $this->Todo_M->insert($this->data);
        redirect('todos/');
    }

}
