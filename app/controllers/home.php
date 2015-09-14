<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function data() {
        $data['app_title'] = "New To-Do";
        return $data;
    }

    public function dashboard() {
        $this->index();
    }

    public function about() {
        $data['app_title'] = "New To-Do";
        $this->load->view('reg/header', $this->data());
        $this->load->view('reg/about', $this->data());
        $this->load->view('reg/footer', $this->data());
    }

    public function index() {
        if (empty($this->session->userdata('first_name'))) {
            $this->load->view('reg/header', $this->data());
            $this->load->view('reg/login', $this->data());
            $this->load->view('reg/footer', $this->data());
        } else {
            $this->load->view('layouts/header', $this->data());
            $this->load->view('dashboard', $this->data());
            $this->load->view('layouts/footer');
        }
    }

}
