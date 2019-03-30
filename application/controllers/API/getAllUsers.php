<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class GetAllUsers extends CI_Controller{
        public function index(){
        

            $querySearch = $this->db->get('users');
            $rows = $querySearch->result_array();
            echo json_encode($rows);
                


        }
    }
?>