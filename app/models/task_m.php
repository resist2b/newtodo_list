<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Task_M extends My_model {

    public function __construct() {
        parent::__construct();
        $this->primary_key = "task_id";
    }
}
