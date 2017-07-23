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
            
            $usuario = $Repository->findOneByEmail($email);

            return is_null($usuario);
        }

        public function cpf_check($cpf){
            
            $usuario = $Repository->findOneByCpf($cpf);

            return is_null($usuario);
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

            $this->db->update('usuario', $this, array('id' => $this->input->post('id')));
        }

        public function creditar()
        {
            $id = $_POST['id'];
            $valor = $_POST['valor'];
            
            $this->db->set('saldo', 'saldo+' . $valor, FALSE);
            $this->db->where('id', $id);
            $this->db->update('usuario');
        }


        public function searchByCpf($search)
        {
            $query = $this->db->select('id, nome')
                ->where('cpf', $search)
                ->get($this->table_name);
            return $query->result_array();
        }

}

