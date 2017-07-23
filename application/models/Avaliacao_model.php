<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_model extends CI_Model {

        private $table_name = 'avaliacao';
        private $Repository;

        public $id;
        public $satisfacao;
        public $comentario;
        public $usuario_id;

        public function __construct()
        {
            parent::__construct();
            $this->Repository = $this->doctrine->em->getRepository('Entity\Avaliacao');
        }

        public function getAll()
        {
            $avaliacoes = $this->Repository->findAll();
            return $avaliacoes;
        }

        public function getById($id)
        {
            $avaliacao = $this->Repository->find($id);
            return $avaliacao;
        }

        

        public function insert()
        {
            $this->load->model('usuario_model');

            $avaliacao = new Entity\Avaliacao();

            $avaliacao->setSatisfacao($this->input->post('satisfacao'));
            $avaliacao->setComentario($this->input->post('comentario'));

            $usuario = $this->usuario_model->getById($this->session->user['id']);

            if(!$usuario){
                return false;
            }

            $avaliacao->setUsuario($usuario);

            $this->doctrine->em->persist($avaliacao);
            $this->doctrine->em->flush();
            return true;
        }

        public function delete($id = null)
        {
            $avaliacao = null;

            if(!is_null($id)){
                $avaliacao = $this->Repository->find($id);
            }elseif($this->input->post('id')){
                $avaliacao = $this->Repository->find($this->input->post('id'));
            }

            if(!$avaliacao){
                return false;
            }
            
            $this->doctrine->em->remove($avaliacao);
            $this->doctrine->em->flush();
            return true;

        }

        public function update()
        {
            
            $avaliacao = $this->Repository->find($this->input->post('id'));

            if(!$avaliacao){
                return false;
            }

            $avaliacao->setSatisfacao($this->input->post('satisfacao'));
            $avaliacao->setComentario($this->input->post('comentario'));
            
            $this->doctrine->em->persist($avaliacao);
            $this->doctrine->em->flush();
            return true;

        }

        public function verificar_avaliacao($userid){
            $this->load->model('usuario_model');

            $usuario = $this->usuario_model->getById($userid);

            $data = array('usuario' => $usuario);

            $result = $this->Repository->findOneBy($data);
            
            return $result; 
        }

        public function create(){
            $avaliacao = new Entity\Avaliacao();

            $avaliacao->setSatisfacao($this->input->post('satisfacao'));
            $avaliacao->setComentario($this->input->post('comentario'));
            
            return $avaliacao;

        }

}

