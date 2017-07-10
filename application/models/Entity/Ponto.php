<?php namespace Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @Entity
 * @Table(name="ponto")
 */
class Ponto
{
    /**
     * @Id
     * @Column(type="integer", name="idPonto")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", name="nome")
     */
    protected $nome;

    /**
     * @Column(type="string", name="endereco")
     */
    protected $endereco;  

 
    public function getId() {
        return $this->id;
    }
 
    public function getNome() {
        return $this->nome;
    }
 
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }
 
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

}