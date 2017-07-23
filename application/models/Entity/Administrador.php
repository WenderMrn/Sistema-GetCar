<?php namespace Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @Entity
 * @Table(name="administrador")
 */
class Administrador
{
    /**
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", name="nome")
     */
    protected $nome;

    /**
     * @Column(type="string", name="email")
     */
    protected $email;

    /**
     * @Column(type="string", name="cpf")
     */
    protected $cpf;  

    /**
     * @Column(type="string", name="senha")
     */
    protected $senha;

 
    public function getId() {
        return $this->id;
    }
 
    public function getNome() {
        return $this->nome;
    }
 
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }
 
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCpf() {
        return $this->cpf;
    }
 
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getSenha() {
        return $this->senha;
    }
 
    public function setSenha($senha) {
        $this->senha = $senha;
    }

}