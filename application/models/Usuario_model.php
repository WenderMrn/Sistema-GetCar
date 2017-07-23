<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

        private $table_name = 'usuario';
        private $Repository;

        public $id;
        public $nome;
        public $email;
        public $cpf;
        public $cep;
        public $senha;
        public $cartao_credito;
        public $endereco;
        public $aprovado;
        public $saldo;

        public function __construct(){
            parent::__construct();
            $this->Repository = $this->doctrine->em->getRepository('Entity\Usuario');

        }

        public function getAll()
        {
            $administradores = $this->Repository->findAll();
            return $administradores;
        }

        public function getPendingUsers()
        {
            $administradores = $this->Repository->findBy(array('aprovado' => 0));
            return $administradores;
        }

        public function getById($id)
        {
            $administradores = $this->Repository->find($id);
            return $administradores;
        }

        public function searchByNameOrCpf($search = '')
        {
            return $this->Repository->createQueryBuilder($this->table_name)
            ->Where('usuario.nome LIKE :search OR usuario.cpf LIKE :search')
            ->setParameter('search', '%'.$search.'%')
            ->getQuery()
            ->getArrayResult();
        }

        public function insert()
        {
            $usuario = new Entity\Usuario();

            $usuario->setNome($this->input->post('nome'));
            $usuario->setEmail($this->input->post('email'));
            $usuario->setCpf($this->input->post('cpf'));
            $usuario->setCep($this->input->post('cep'));
            $usuario->setCartaoCredito($this->input->post('cartao_credito'));
            $usuario->setEndereco($this->input->post('endereco'));
            $usuario->setAprovado(0);
            $usuario->setSenha(md5($this->input->post('senha')));

            $this->doctrine->em->persist($usuario);
            $this->doctrine->em->flush();
        }

        public function email_check($email){
            
            $usuario = $this->Repository->findOneByEmail($email);

            return is_null($usuario);
        }

        public function cpf_check($cpf){
            
            $usuario = $this->Repository->findOneByCpf($cpf);

            return is_null($usuario);
        }

        public function delete($id = null)
        {
            $usuario = null;

            if(!is_null($id)){
                $usuario = $this->Repository->find($id);
            }elseif($this->input->post('id')){
                $usuario = $this->Repository->find($this->input->post('id'));
            }

            if(!$usuario){
                return false;
            }
            
            $this->doctrine->em->remove($usuario);
            $this->doctrine->em->flush();
            return true;
        }

        public function validate(){

            $data = array('email' => $this->input->post('email'), 'senha' => md5($this->input->post('senha')));

            $result = $this->Repository->findOneBy($data);
            
            if($result){
                $data = array();
                $data['id'] = $result->getId();
                $data['nome'] = $result->getNome();
                $data['email'] = $result->getEmail();
                return $data;
            }
            
            return false;

        }

        public function userAccept($id){
            $usuario = $this->Repository->find($id);

            if(!$usuario){
                return false;
            }

            $usuario->setAprovado(1);

            $this->doctrine->em->persist($usuario);
            $this->doctrine->em->flush();

            return true;
        }

        public function userDeny($id){
            $usuario = $this->Repository->find($id);

            if(!$usuario){
                return false;
            }

            $usuario->setAprovado(2);

            $this->doctrine->em->persist($usuario);
            $this->doctrine->em->flush();

            return true;
        }

        public function update()
        {

            $usuario = $this->Repository->find($this->input->post('id'));

            if(!$usuario){
                return false;
            }

            $usuario->setNome($this->input->post('nome'));
            $usuario->setEmail($this->input->post('email'));
            $usuario->setCpf($this->input->post('cpf'));
            $usuario->setCep($this->input->post('cep'));
            $usuario->setCartaoCredito($this->input->post('cartao_credito'));
            $usuario->setEndereco($this->input->post('endereco'));
            
            if(!empty($this->input->post('senha'))){
                $usuario->setSenha(md5($this->input->post('senha')));
            }

            $this->doctrine->em->persist($usuario);
            $this->doctrine->em->flush();
            return true;

        }

        public function creditar()
        {
            $usuario = $this->Repository->find($this->input->post('id'));

            $usuario->creditar($this->input->post('valor'));
            
            $this->doctrine->em->persist($usuario);
            $this->doctrine->em->flush();
        }


        public function searchByCpf($search)
        {
            return $this->Repository->createQueryBuilder($this->table_name)
            ->Where('usuario.cpf LIKE :search')
            ->setParameter('search', '%'.$search.'%')
            ->getQuery()
            ->getArrayResult();
        }

        public function create(){
            $usuario = new Entity\Usuario();

            $usuario->setNome($this->input->post('nome'));
            $usuario->setEmail($this->input->post('email'));
            $usuario->setCpf($this->input->post('cpf'));
            $usuario->setCep($this->input->post('cep'));
            $usuario->setCartaoCredito($this->input->post('cartao_credito'));
            $usuario->setEndereco($this->input->post('endereco'));

            return $usuario;

        }

}

