<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ponto_model extends CI_Model {

    private $table_name = "ponto_locacao";


        public $nome;
        public $endereco;

    

    public function getAll($id)
        {

            $query = $this->db->select('p.id, p.nome, p.endereco')
                  ->from('ponto_locacao p')
                  ->join('ponto_to_adm pta', 'p.id = pta.id_ponto')
                  ->where('pta.id_adm', $id)
                  ->join('administrador a', 'a.id = pta.id_adm')
                  ->get();

            return $query->result_array();
        }

    public function insert()
        {
            $this->nome    = $_POST['nome']; // please read the below note
            $this->endereco  = $_POST['endereco'];

            $this->db->insert('ponto_locacao', $this);
        }

}

