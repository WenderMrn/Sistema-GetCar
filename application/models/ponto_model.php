<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ponto_model extends CI_Model {

    

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

}

