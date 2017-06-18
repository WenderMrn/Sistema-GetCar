<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_model extends CI_Model {

        private $table_name = "administrador";

        public $id;
        public $nome;
        public $email;
        public $cpf;
        public $senha;

        public function getAll()
        {
            $query = $this->db->get('administrador');
            return $query->result_array();
        }

        public function getById($id)
        {
            // $query = $this->db->get('administrador');
            $query = $this->db->get_where('administrador', array('id' => $id));
            return $query->result_array();
        }

        public function email_check($email){
            
            $query = $this->db->select('*')
                ->where('email', $email)
                ->get($this->table_name);

            return empty($query->result_array());
        }

        public function cpf_check($cpf){
            
            $query = $this->db->select('*')
                ->where('cpf', $cpf)
                ->get($this->table_name);

            return empty($query->result_array());
        }

        
        public function insert()
        {
            $this->nome    = $_POST['nome']; // please read the below note
            $this->email  = $_POST['email'];
            $this->cpf     = $_POST['cpf'];
            $this->senha     = md5($_POST['senha']);

            $this->db->insert('administrador', $this);
        }

        public function delete()
        {
            $this->db->where('id', $_POST['id']);
            return $this->db->delete('administrador');
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
            $this->id     = $this->input->post('id');
            $this->nome    = $this->input->post('nome'); 
            $this->email  = $this->input->post('email');
            $this->cpf     = $this->input->post('cpf');
            if(!empty($this->input->post('senha'))){
                    $this->senha = md5($this->input->post('senha'));
            }else{
                    $query = $this->db->get_where('administrador', array('id' => $this->input->post('id')));
                    $this->senha = $query->result_array()[0]['senha'];
            }

            $this->db->update('administrador', $this, array('id' => $this->input->post('id')));
        }

}

