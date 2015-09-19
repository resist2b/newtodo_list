<?php

class MY_Controller extends CI_Controller {

    const APP_NAME = 'Moataz TODO List';

    public $data = array();
    public $timestamp;

    public function __construct() {
        parent::__construct();
        $this->timestamp = date('Y-m-d G:i:s');
        date_default_timezone_set('Africa/Cairo');
        $this->data['app_title'] = self::APP_NAME;
    }

    /**
     * Get last 4 navbar_top_todos
     * @return type
     */
    public function navbar_top_todos() {
        $this->db->select('*');
        $this->db->from('todos');
        $user_id = $this->session->userdata('id');
        $this->db->where('todos.user_id', $user_id);
        $this->db->where('todos.is_complete', 0);
        $this->db->limit(4);
        $this->db->order_by('todos.due_date');
        return $this->db->get()->result();
    }

    public function get_all_categories() {
         $this->db->select('*');
        $this->db->from('categories');
        $this->db->join('users', 'categories.category_user_id = users.id');
        $this->db->join('todos', 'categories.id = todos.category_id', 'left');
        $this->db->where('category_user_id', $this->session->userdata('id'));
        return $this->db->get();
    }

    /**
     * get All user Data
     * @return type
     */
    public function get_user() {
        $this->db->from('users');
        $this->db->where('id', $this->session->userdata('id'));
        return $this->db->get()->result();
    }


    public function get_todos() {
        date_default_timezone_set('Africa/Cairo');
        $user_id = $this->session->userdata('id');
        /* Get data from 3 tables using join */
        $this->db->select('*');
        $this->db->from('todos');
        $this->db->join('users', 'todos.user_id = users.id');
        $this->db->join('categories', 'todos.category_id = categories.id');
        $this->db->where('todos.user_id', $user_id);
        $this->db->where('todos.is_voided', 0);
        $this->db->where('todos.is_complete', 0);
        /* order_by due_date .. to work on this todos */
        $this->db->order_by('todos.due_date');
        return $this->db->get();
    }
    public function get_categories() {
        /* Get data from 3 tables using join */
//        $this->db->select('*');
//        $this->db->from('categories');
//        $this->db->join('categories', 'todos.category_id = categories.id');
//        $this->db->where('category_user_id', $this->session->userdata('id'));
        /* order_by due_date .. to work on this todos */
//        $this->db->order_by('todos.due_date');
//        return $this->db->get();
    }

    public function get_Done_TODOs() {
        $user_id = $this->session->userdata('id');
        /* Get data from 3 tables using join */
        $this->db->select('*');
        $this->db->from('todos');
        $this->db->join('users', 'todos.user_id = users.id');
        $this->db->join('categories', 'todos.category_id = categories.id');
        $this->db->where('todos.user_id', $user_id);
        $this->db->where('todos.is_complete', 1);
        /* order_by due_date .. to work on this todos */
        $this->db->order_by('todos.due_date', 'desc');
        return $this->db->get();
    }

    public function get_Voided_TODOs() {
        $user_id = $this->session->userdata('id');
        /* Get data from 3 tables using join */
        $this->db->select('*');
        $this->db->from('todos');
        $this->db->join('users', 'todos.user_id = users.id');
        $this->db->join('categories', 'todos.category_id = categories.id');
        $this->db->where('todos.user_id', $user_id);
        $this->db->where('todos.is_voided', 1);
        $this->db->where('todos.is_complete', 0);
        /* order_by due_date .. to work on this todos */
        $this->db->order_by('todos.due_date', 'desc');
        return $this->db->get();
    }

    public function get_category_todos() {
        /* preparing phase */
        $user_id = $this->session->userdata('id');
        $category_id = $this->uri->slash_segment(3);
        /* get todos.todos.category_id */
        $this->db->select('*');
        $this->db->from('todos');
        $this->db->where('todos.user_id', $user_id);
        $this->db->where('todos.category_id', $category_id);
        $this->db->join('users', 'todos.user_id = users.id');
        $this->db->join('categories', 'todos.category_id = categories.id');
        return $this->db->get();
    }
    
     public function about_app() {
        $this->load->view('layouts/header', $this->data);
        $this->load->view('about', $this->data);
        $this->load->view('layouts/footer', $this->data);
    }
    
    
     public function pendingTodos() {
        
          if (!($this->session->userdata('first_name'))) {
            $this->load->view('reg/header', $this->data);
            $this->load->view('reg/login', $this->data);
            $this->load->view('reg/footer', $this->data);
        } else {

            $this->data['categories'] = $this->get_all_categories();
            /* preparing phase */
            $this->data['page_title'] = "Pending TODOs";
            $this->data['todos'] = $this->get_todos()->result();
            $this->data['todos_num_rows'] = $this->get_todos()->num_rows();
          
            /* load views */
            $this->load->view('layouts/header', $this->data);
            $this->load->view('todos/show_todos', $this->data);
            $this->load->view('layouts/footer');
        }
    }
    
    
    

}
