<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!($this->session->userdata('first_name'))) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->show_all();
    }
    
    public function getCategories() {
     $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('category_user_id', $this->session->userdata('id'));
        return $this->db->get();
    }

    /**
     * two steps
     * 1.categories show_all()
     * 2.get $todos_num_rows inside show_categories view
     */
        
    public function show_all() {
        /* preparing phase */
        $this->data['page_title'] = "Categories";
       
       /* get Categories */
        $this->data['categories'] = $this->getCategories()->result();
        $this->data['categoriesNumRows'] = $this->getCategories()->num_rows();

        /* load views */
        $this->load->view('layouts/header', $this->data);
        $this->load->view('categories/show_categories', $this->data);
        $this->load->view('layouts/footer');
    }

    public function getTodosNumber() {
        $this->db->get_where('todos', array(
            'category_id' => $category->category_id,
            'user_id' => $this->session->userdata('id'),
        ));
        echo ($query->num_rows() > 0 ? $query->num_rows() : 'No');
    }

    public function add_new_category() {
        $this->data['page_title'] = "Add Category";
        $this->load->view('layouts/header', $this->data);
        $this->load->view('categories/add_category');
        $this->load->view('layouts/footer');
    }

    public function edit_category() {

        $this->data['page_title'] = "Edit Category";
        /* Get Category From DB */
        $category_id = $this->input->post('category_id');
        $this->data['category'] = $this->db->get_where('categories', array('id' => $category_id))->row();


        $this->load->view('layouts/header', $this->data);
        $this->load->view('categories/edit_category', $this->data);
        $this->load->view('layouts/footer');
    }

    public function validation_category() {
        $this->form_validation->set_rules('category_name', 'category_name', 'is_unique[categories.category_name]|strip_tagstrim|xxs_claen|trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('category_body', 'category_body', 'strip_tagstrim|xxs_claen|trim|required|min_length[5]');

        if ($this->form_validation->run() == true) {
            return TRUE;
        }
    }

    public function updateCategory() {
        if ($this->validation_category()) {
            $data = [
                'category_name' => $this->input->post('category_name'),
                'category_body' => $this->input->post('category_body'),
            ];

            $this->db->update('categories', $data, ['id' => $this->input->post('category_id')]);

            redirect('categories');
        }
        echo 'false';
    }

    public function save_category() {
        $this->data = [
            'category_name' => htmlspecialchars($this->input->post('category_name')),
            'category_body' => htmlspecialchars($this->input->post('category_body')),
            'create_date' => htmlspecialchars(date('Y-m-d H:i:s')),
            'category_user_id' => $this->session->userdata('id')
        ];
        $this->load->model('category_M');
        $this->category_M->insert($this->data);

        /* conditional redirect 
         * if i add new category after page refresh my new category be in front of all categories :)
         */
        if ($this->input->post('send_from') == 'tasks/add_new_task') {
            redirect($this->input->post('send_from'));
        }
        redirect('categories/');
    }

    public function delete($id) {
        $id = $this->uri->slash_segment(3);
        $this->load->model('category_M');
        $this->category_M->delete($id);
        redirect('categories');
    }

}
