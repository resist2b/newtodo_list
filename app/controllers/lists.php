<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lists extends CI_Controller {

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
       $this->db->from('lists');
//        $this->db->join('users', 'lists.list_user_id = users.id');
        $this->db->join('tasks', 'lists.id = tasks.list_id','left');
        $this->db->where('list_user_id',$this->session->userdata('id'));
        $this->db->group_by('lists.id');
        $lists['lists'] = $this->db->get()->result();
        $app['app_title'] = "Lists";
        $this->load->view('layouts/header', $app);
        $this->load->view('lists/show_lists', $lists);
        $this->load->view('layouts/footer');
    }

    public function add_new_list() {
        $app['app_title'] = "Add New List";
        //get $lists
        //load form & passing $lists
        $this->load->view('layouts/header', $app);
        $this->load->view('lists/add_list');
        $this->load->view('layouts/footer');
    }

    public function save_list() {
        $data = [
            'list_name' => htmlspecialchars($this->input->post('list_name')),
            'list_body' => htmlspecialchars($this->input->post('list_body')),
            'create_date' => date('Y-m-d H:i:s'),
            'list_user_id' => htmlspecialchars($this->session->userdata('id'))
        ];

        $this->load->model('List_M');
        $this->List_M->insert($data);
        redirect('lists/');
    }
    
    
     public function delete($id) {
        $id = $this->uri->slash_segment(3);
         $this->load->model('List_M');
        $this->List_M->delete($id);
        redirect('lists');
    }

}
