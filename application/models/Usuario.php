<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

        public $id;
        public $nome;
        public $email;
        public $cpf;
        public $senha;

        public function getAll()
        {
            $query = $this->db->get('usuario');
            return $query->result_array();
        }

        public function getById($id)
        {
            // $query = $this->db->get('administrador');
            $query = $this->db->get_where('usuario', array('id' => $id));
            return $query->result_array();
        }

        public function __construct()
        {
            parent::__construct();
        }

        public function insert()
        {
            $this->nome    = $_POST['nome']; // please read the below note
            $this->email  = $_POST['email'];
            $this->cpf     = $_POST['cpf'];
            $this->senha     = md5($_POST['senha']);

            $this->db->insert('usuario', $this);
        }

        public function delete()
        {
            $this->db->where('id', $_POST['id']);
            return $this->db->delete('usuario');
        }

        public function validate(){
            $this->email  = $_POST['email'];
            $this->senha  = md5($_POST['senha']);

            // $result = $this->db->get_where(array('email' => $this->email, 'senha' => $this->senha));
            $result = $this->db->select(array('id', 'nome', 'email'))
                    ->where(array('email' => $this->email, 'senha' => $this->senha))
                    ->get('usuario');
            
            if($result->result_array()){
                    return $result->result_array()[0];
            }
            
            return false;

        }

        public function update()
        {
            $this->id     = $_POST['id'];
            $this->nome    = $_POST['nome']; 
            $this->email  = $_POST['email'];
            $this->cpf     = $_POST['cpf'];
            if(isset($_POST['senha']) && !empty($_POST['senha'])){
                    $this->senha = md5($_POST['senha']);
            }else{
                    $query = $this->db->get_where('usuario', array('id' => $_POST['id']));
                    $this->senha = $query->result_array()[0]['senha'];
            }

            $this->db->update('usuario', $this, array('id' => $_POST['id']));
        }

}

