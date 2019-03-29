<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class CrudPHP extends CI_Controller{
        public function index(){
            $this->load->view('indexCrud');
        }
    }
?>