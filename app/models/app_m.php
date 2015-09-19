<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_M extends CI_Model {
    
      public $app = "Moataz TODO List";
    public $timestamp;

    public function __construct() {
        parent::__construct();
        $this->timestamp = date('Y-m-d G:i:s');
        $this->navbar_top_todos();
        }

    /**
     * Get last 4 navbar_top_todos
     * @return type
     */
    public static function navbar_top_todos() {
        $this->db->select('*');
        $this->db->from('todos');
        $user_id = $this->session->userdata('id');
        $this->db->where('todos.user_id', $user_id);
        $this->db->limit(4);
        $this->db->order_by('todos.due_date');
        return $this->db->get()->result();
    }


}
