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

            $Repository = $this->doctrine->em->getRepository('Entity\Administrador');
            $administradores = $Repository->findAll();
            return $administradores;
        }

        public function getById($id)
        {
            $administrador = $this->doctrine->em->find('Entity\Administrador', $id);
            return $administrador;
        }

        public function email_check($email){

            $Repository = $this->doctrine->em->getRepository('Entity\Administrador');
            $administrador = $Repository->findOneByEmail($email);

            return is_null($administrador);
        }

        public function cpf_check($cpf){
            
            $Repository = $this->doctrine->em->getRepository('Entity\Administrador');
            $administrador = $Repository->findOneByCpf($cpf);

            return is_null($administrador);
        }

        
        public function insert()
        {
            $administrador = new Entity\Administrador();

            $administrador->setNome($_POST['nome']);
            $administrador->setEmail($_POST['email']);
            $administrador->setCpf($_POST['cpf']);
            $administrador->setSenha($_POST['senha']);

            $this->doctrine->em->persist($administrador);
            $this->doctrine->em->flush();
        }

        public function delete()
        {
            $administrador = $this->doctrine->em->find('Entity\Administrador', $_POST['id']);
            if(!$administrador){
                return false;
            }
            $this->doctrine->em->remove($administrador);
            $this->doctrine->em->flush();
            return true;
        }

        public function validate(){

            $data = array('email' => $this->input->post('email'), 'senha' => md5($this->input->post('senha')));

            $Repository = $this->doctrine->em->getRepository('Entity\Administrador');
            $result = $Repository->findOneBy($data);
            
            if($result){
                $data = array();
                $data['id'] = $result->getId();
                $data['nome'] = $result->getNome();
                $data['email'] = $result->getEmail();
                return $data;
            }
            
            return false;

        }

        public function update()
        {
            $Repository = $this->doctrine->em->getRepository('Entity\Administrador');
            $administrador = $Repository->find($this->input->post('id'));

            if(!$administrador){
                return false;
            }

            $administrador->setNome($_POST['nome']);
            $administrador->setEmail($_POST['email']);
            $administrador->setCpf($_POST['cpf']);

            if(!empty($this->input->post('senha'))){
                $administrador->setSenha(md5($this->input->post('senha')));
            }

            $this->doctrine->em->persist($administrador);
            $this->doctrine->em->flush();
            return true;
        }

        public function create(){
            $administrador = new Entity\Administrador();

            $administrador->setNome($this->input->post('nome'));
            $administrador->setEmail($this->input->post('email'));
            $administrador->setCpf($this->input->post('cpf'));

            return $administrador;

        }

}

