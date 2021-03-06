<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_M extends My_model {

    public function index() {
        echo __METHOD__;
    }

    public function get_user() {
        echo __METHOD__;
    }

    public function save_user() {
        $data = [
            'first_name' => htmlspecialchars($this->input->post('first_name')),
            'last_name' => htmlspecialchars($this->input->post('last_name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => md5($this->input->post('password')),
            'reg_date' => htmlspecialchars(date("d-m-Y")),
        ];
        if ($this->User_M->insert($data)) {
            $this->session->set_flashdata('save', 'User Registered,Now you Can login');
            $this->session->set_flashdata('username', $data['username']);
            redirect(base_url());
        } else {
            echo 'error in saving user';
        }
    }

}
