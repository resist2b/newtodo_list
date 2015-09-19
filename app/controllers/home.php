<?php
/* error reporting - all errors for development (ensure you have display_errors = On in your php.ini file) */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    public function index() {
     parent::pendingTodos();
    }

    public function about() {
        parent::about_app();
    }
    


}
