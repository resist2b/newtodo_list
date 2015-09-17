<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
    
    

    public $app = "Moataz TODO List";

    public function dashboard() {
        $this->index();
    }

    public function about() {
        $data['app_title'] = $this->app;
        $this->load->view('reg/header', $data);
        $this->load->view('reg/about', $data);
        $this->load->view('reg/footer', $data);
    }

    public  function index() {
        $data['app_title'] = $this->app;
        if (!($this->session->userdata('first_name'))) {
            $this->load->view('reg/header', $data);
            $this->load->view('reg/login', $data);
            $this->load->view('reg/footer', $data);
        } else {

            /* Get last 4 navbar_top_tasks  */
            $this->db->select('*');
            $this->db->from('tasks');
            $user_id = $this->session->userdata('id');
            $this->db->where('tasks.user_id', $user_id);
            $this->db->limit(4);
            $this->db->order_by('tasks.due_date','desc');
            $data['navbar_top_tasks'] = $this->db->get()->result();
            /* load views */
            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('layouts/footer');
        }
    }

}
