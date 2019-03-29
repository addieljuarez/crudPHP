
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');  
    //require(APPPATH.'libraries/REST_Controller.php');
    
    class AddUser extends CI_Controller{
        public function index(){
            
            
            $user = $this->input->post('user', TRUE);
            $password = $this->input->post('password', TRUE);
            

            if($user != NULL && $password != NULL){
                // $query
                $query = $this->db->query("SELECT * FROM users");
                $row = $query->result_array();
                $row = $query->result_array();
                //echo $count = $query->num_rows();
                // echo json_encode($row);
            }else{
                echo '{"error":"faltan datos"}';
            }
            
        }

       
    }

?>

