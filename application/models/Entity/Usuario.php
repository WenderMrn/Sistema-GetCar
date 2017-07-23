<?php namespace Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @Entity
 * @Table(name="usuario")
 */
class Usuario
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

    /**
     * @Column(type="string", name="cartao_credito")
     */
    protected $cartao_credito;

    /**
     * @Column(type="string", name="endereco")
     */
    protected $endereco;

    /**
     * @Column(type="integer", name="aprovado")
     */
    protected $aprovado;

    /**
     * @Column(type="string", name="saldo")
     */
    protected $saldo;

    /**
     * @Column(type="string", name="cep")
     */
    protected $cep;

 
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

    public function getCartaoCredito() {
        return $this->cartao_credito;
    }
 
    public function setCartaoCredito($cartao_credito) {
        $this->cartao_credito = $cartao_credito;
    }

    public function getEndereco() {
        return $this->endereco;
    }
 
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getAprovado() {
        return $this->aprovado;
    }
 
    public function setAprovado($aprovado) {
        $this->aprovado = $aprovado;
    }

    public function getSaldo() {
        return $this->saldo;
    }
 
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    public function getCep() {
        return $this->cep;
    }
 
    public function setCep($cep) {
        $this->cep = $cep;
    }

}