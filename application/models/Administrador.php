<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Model {

        public $id;
        public $nome;
        public $email;
        public $cpf;
        public $senha;

        // public function get_last_ten_entries()
        // {
        //         $query = $this->db->get('entries', 10);
        //         return $query->result();
        // }

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

                $this->db->insert('administrador', $this);
        }

        public function validate(){
                $this->email  = $_POST['email'];
                $this->senha  = md5($_POST['senha']);

                // $result = $this->db->get_where(array('email' => $this->email, 'senha' => $this->senha));
                $result = $this->db->select(array('id', 'nome', 'email'))
                        ->where(array('email' => $this->email, 'senha' => $this->senha))
                        ->get('administrador');
                
                if($result->result_array()){
                        return $result->result_array()[0];
                }
                
                return false;

        }

        public function update()
        {
                $this->id     = $_POST['id'];
                $this->nome    = $_POST['nome']; // please read the below note
                $this->email  = $_POST['email'];
                $this->cpf     = $_POST['cpf'];
                if(isset($_POST['senha']) && !empty($_POST['senha'])){
                        $this->senha = md5($_POST['senha']);
                }else{
                        $adm = $this->db->get_where('administrador', array('id' => $_POST['id']));
                        $this->senha = $adm->senha;
                }

                $this->db->update('administrador', $this, array('id' => $_POST['id']));
        }

}

