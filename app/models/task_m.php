<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Task_M extends My_model {

    public function __construct() {
        parent::__construct();
        $this->primary_key = "task_id";
    }

    public function get_lists() {
        $this->load->model('List_M');
        return $this->List_M->get_all();
    }
    
    public function get_lists_by(array $cols) {
        $this->load->model('List_M');
        return $this->List_M->get_by($cols);
    }

}
