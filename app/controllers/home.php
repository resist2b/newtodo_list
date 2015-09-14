<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

//    public function data() {
//        $data['app_title'] = "New To-Do";
//        return $data;
//    }

    public function dashboard() {
        $this->index();
    }

    public function about() {
        $data['app_title'] = "New To-Do";
        $this->load->view('reg/header', $data);
        $this->load->view('reg/about', $data);
        $this->load->view('reg/footer', $data);
    }

    public function index() {
         $data['app_title'] = "New To-Do";
        if (!($this->session->userdata('first_name'))) {
            $this->load->view('reg/header', $data);
            $this->load->view('reg/login', $data);
            $this->load->view('reg/footer', $data);
        } else {
            $this->load->view('layouts/header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('layouts/footer');
        }
    }

}
