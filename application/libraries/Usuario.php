<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario {

	private string $nomeCompleto;
	private string $cpf;
	private string $endereco;
	private string $cartaoCredito;
	private string $email;
	private string $senha;

    public function getNomeCompleto(){
    	return $this->nomeCompleto;
    }

    public function getCpf(){
    	return $this->cpf;
    }

    public function getEndereco(){
    	return $this->endereco;
    }

    public function getCartaoCredito(){
    	return $this->cartaoCredito;
    }

    public function getEmail(){
    	return $this->email;
    }

    public function getSenha(){
    	return $this->senha;
    }


}