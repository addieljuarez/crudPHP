
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');  
    //require(APPPATH.'libraries/REST_Controller.php');
    
    class AddUser extends CI_Controller{
        public function index(){
            
            
            // $user = $this->input->post('user', TRUE);
            // $password = $this->input->post('password', TRUE);
            

            // if($user != NULL && $password != NULL){
            //     // $query
            //     $query = $this->db->query("SELECT * FROM users");
            //     $row = $query->result_array();
               
            //     //echo $count = $query->num_rows();
            //     // echo json_encode($row);
            // }else{
            //     echo '{"error":"faltan datos"}';
            // }


            // $this->db->select('title, content, date');
            // $query = $this->db->get('mytable');

            /*
             *
             * Forma 1 de query 
            */

            // $query = $this->db->query("SELECT * FROM users");
            // $row = $query->result_array();
            // echo json_encode($row);

            /*
             *
             * Forma 2 de query 
            */
            // $query = $this->db->get('users');
            // $rowsCount = $query->num_rows();
            // $rows = $query->result_array();
            // echo json_encode($rows);

            
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            $address = $this->input->post('address', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $name = $this->input->post('name', TRUE);

            if($email == NULL || $password == NULL || $phone == NULL  || $address == NULL || $name == NULL){
                echo '{"error":"faltan datos"}';
            }else{

                // PRIMERO SE REVISA que se  o exista ese usuario
                $arrayWhere = array('email' =>  $email);
                $querySearch = $this->db->get_where('users', $arrayWhere);
                
                if($querySearch == TRUE){
                    $queryCount = $querySearch->num_rows();

                    if($queryCount > 0){
                        $arrayResponseCount = array('message' => 'Ya esta registrado ese correo' );
                        echo json_encode($arrayResponseCount);
                    }else{
                        // $data = array(
                        //     'title' => 'My title',
                        //     'name' => 'My Name',
                        //     'date' => 'My date'
                        // );
                        // $this->db->insert('mytable', $data);
                        // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')

                        $data = array(
                            'email'     =>  $email,
                            'password'  =>  $password,
                            'address'   =>  $address,
                            'phone'     =>  $phone,
                            'name'      =>  $name
                        );

                        $query = $this->db->insert('users', $data);

                        if($query == TRUE){
                            $responseInsert = array('message' => 'Se guardo el usuario de manera correcta');
                            echo json_encode($responseInsert);
                        }else{
                            $responseInsert = array('message' => 'NO se guardo el usuario de manera correcta');
                        }
                    }
                }else{
                    echo 'error en query';
                }
                


            }
            
        }

        function insertUser(){

        }

       
    }

?>

