<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');  

    class Login extends CI_Controller{
        public function index(){

            $email = $this->input->post('user', TRUE);
            $pass = $this->input->post('pass', TRUE);

            if($email == NULL || $pass == NULL ){
                
                $arrayResponse = array('error' => 'Falta algín dato');
                echo json_encode($arrayResponse);

            }else{
                $dataSearchUser = array(
                    'email' => $email, 
                    'password' => $pass,
                );

                $querySearch = $this->db->get_where('users', $dataSearchUser);
                $rowsNum = $querySearch->num_rows();
                $rows = $querySearch->result_array();
                

                if($rowsNum > 0){
                    echo json_encode($rows);
                }else{
                    $arrayError = array('error' => 'user / password incorrectos');
                    echo json_encode($arrayError);
                }

            }


        }
    }
?>