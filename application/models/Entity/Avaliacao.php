<?php namespace Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @Entity
 * @Table(name="avaliacao")
 */
class Avaliacao
{
    /**
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", name="satisfacao")
     */
    protected $satisfacao;

    /**
     * @Column(type="string", name="comentario")
     */
    protected $comentario;

    
    /**
     * @OneToOne(targetEntity="Usuario")
     * @JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    protected $usuario;

 
    public function getId() {
        return $this->id;
    }
 
    public function getSatisfacao() {
        return $this->satisfacao;
    }
 
    public function setSatisfacao($satisfacao) {
        $this->satisfacao = $satisfacao;
    }

    public function getComentario() {
        return $this->comentario;
    }
 
    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function getUsuario() {
        return $this->usuario;
    }
 
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    

}