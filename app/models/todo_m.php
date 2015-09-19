<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Todo_M extends My_model {

    public function __construct() {
        parent::__construct();
        $this->primary_key = "todo_id";
    }

    public function get_categories() {
        $this->load->model('Category_M');
        return $this->Category_M->get_all();
    }
    
    public function get_categories_by(array $cols) {
        $this->load->model('Category_M');
        return $this->Category_M->get_by($cols);
    }

}
