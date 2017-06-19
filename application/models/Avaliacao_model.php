<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_model extends CI_Model {

        private $table_name = 'avaliacao';

        public $id;
        public $satisfacao;
        public $comentario;
        public $usuario_id;

        public function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            $query = $this->db->get($this->table_name);
            return $query->result_array();
        }

        public function getById($id)
        {
            $query = $this->db->get_where($this->table_name, array('id' => $id)); 
            return $query->result_array();
        }

        

        public function insert()
        {
            $this->satisfacao       = $this->input->post('satisfacao');
            $this->comentario       = $this->input->post('comentario');
            $this->usuario_id       = $this->input->post('usuario_id');

            $this->db->insert($this->table_name, $this);
        }

        public function delete($id = null)
        {
            if($id !== null){
                $this->db->where('id', $id);
                return $this->db->delete($this->table_name);
            }elseif(isset($_POST['id'])){
                $this->db->where('id', $_POST['id']);
                return $this->db->delete($this->table_name);
            }
            return false;

        }

        public function update()
        {
            $this->id               = $this->input->post('id');
            $this->satisfacao       = $this->input->post('satisfacao');
            $this->comentario       = $this->input->post('comentario');
            $this->usuario_id       = $this->input->post('usuario_id');

            $this->db->update($this->table_name, $this, array('id' => $this->input->post('id')));
        }

}

