<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

        private $table_name = 'usuario';

        public $id;
        public $nome;
        public $email;
        public $cpf;
        public $cep;
        public $senha;
        public $cartao_credito;
        public $endereco;
        public $aprovado;

        public function getAll()
        {
            $query = $this->db->get('usuario');
            return $query->result_array();
        }

        public function getPendingUsers()
        {
            $query = $this->db->get_where('usuario', array('aprovado' => 0));
            return $query->result_array();
        }

        public function getById($id)
        {
            $query = $this->db->get_where('usuario', array('id' => $id)); 
            return $query->result_array();
        }

        public function searchByNameOrCpf($search = 'Usu')
        {
            $query = $this->db->select('*')
                ->like('nome', $search)
                ->or_like('cpf', $search)
                // ->or_where('cpf', $search)
                ->get($this->table_name);
            // $query = $this->db->get_where('usuario', array('nome' => $search))->or_where('cpf', $search);

            // var_dump($query->result_array()); exit;
            return $query->result_array();
        }

        public function __construct()
        {
            parent::__construct();
        }

        public function insert()
        {
            $this->nome             = $_POST['nome']; // please read the below note
            $this->email            = $_POST['email'];
            $this->cpf              = $_POST['cpf'];
            $this->cep              = $_POST['cep'];
            $this->cartao_credito   = $_POST['cartao_credito'];
            $this->endereco         = $_POST['endereco'];
            $this->aprovado         = 0;
            $this->senha            = md5($_POST['senha']);

            $this->db->insert($this->table_name, $this);
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

        public function delete($id = null)
        {
            if($id !== null){
                $this->db->where('id', $id);
                return $this->db->delete('usuario');
            }elseif(isset($_POST['id'])){
                $this->db->where('id', $_POST['id']);
                return $this->db->delete('usuario');
            }
            return false;

        }

        public function validate(){
            $this->email  = $_POST['email'];
            $this->senha  = md5($_POST['senha']);

            // $result = $this->db->get_where(array('email' => $this->email, 'senha' => $this->senha));
            $result = $this->db->select(array('id', 'nome', 'email', 'aprovado'))
                    ->where(array('email' => $this->email, 'senha' => $this->senha))
                    ->get('usuario');
            
            if($result->result_array()){
                    return $result->result_array()[0];
            }
            
            return false;

        }

        public function userAccept($id){
            return $this->db->update('usuario', array('aprovado' => 1), array('id' => $id));
        }

        public function userDeny($id){
            return $this->db->update('usuario', array('aprovado' => 2), array('id' => $id));
        }

        public function update()
        {
            $this->id             = $this->input->post('id');
            $this->nome             = $this->input->post('nome');
            $this->email            = $this->input->post('email');
            $this->cpf              = $this->input->post('cpf');
            $this->cep              = $this->input->post('cep');
            $this->cartao_credito   = $this->input->post('cartao_credito');
            $this->endereco         = $this->input->post('endereco');

            if(!empty($this->input->post('senha'))){
                    $this->senha = md5($this->input->post('senha'));
            }else{
                    $query = $this->db->get_where('usuario', array('id' => $this->input->post('id')));
                    $this->senha = $query->result_array()[0]['senha'];
            }

            $this->db->update('usuario', $this);
        }

}

