<?php namespace Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * @Entity
 * @Table(name="veiculo")
 */
class Veiculo
{
    /**
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", name="placa")
    */
    protected $placa;

    /**
     * @Column(type="string", name="marca")
    */
    protected $marca;

    /**
     * @Column(type="string", name="modelo")
    */
    protected $modelo;

    /**
     * @Column(type="datetime", name="ano")
    */
    protected $ano;

    /**
     * @Column(type="string", name="categoria")
    */
    protected $categoria;

    /**
     * @Column(type="string", name="chassi")
    */
    protected $chassi;

    /**
     * @Column(type="string", name="renavam")
    */
    protected $renavam;

    /**
     * @Column(type="string", name="cor")
    */
    protected $cor;

    /**
     * @Column(type="integer", name="portas")
    */
    protected $portas;

    /**
     * @Column(type="boolean", name="ativo")
    */
    protected $ativo;

    /**
     * @OneToOne(targetEntity="usuario")
     * @JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    protected $proprietario;

    public function getId(){
    	return $this->id;
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function getPlaca(){
    	return $this->placa;
    }

    public function setPlaca($placa){
    	$this->placa = $placa;
    }

    public function getMarca(){
    	return $this->marca;
    }

    public function setMarca($marca){
    	$this->marca = $marca;
    }

    public function getModelo(){
    	return $this->modelo;
    }

    public function setModelo($modelo){
    	$this->modelo = $modelo;
    }

    public function getAno(){
    	return $this->ano;
    }

    public function setAno($ano){
    	$this->ano = $ano;
    }

    public function getCategoria(){
    	return $this->categoria;
    }

    public function setCategoria($categoria){
    	$this->categoria = $categoria;
    }

    public function getChassi(){
    	return $this->chassi;
    }

    public function setChassi($chassi){
    	$this->chassi = $chassi;
    }

    public function getRenavam(){
    	return $this->renavam;
    }

    public function setRenavam($renavam){
    	$this->renavam = $renavam;
    }

    public function getCor(){
    	return $this->cor;
    }

    public function setCor($cor){
    	$this->cor = $cor;
    }

    public function getPortas(){
    	return $this->portas;
    }

    public function setPortas($portas){
    	$this->portas = $portas;
    }

    public function getAtivo(){
    	return $this->ativo;
    }

    public function setAtivo($ativo){
    	$this->ativo = $ativo;
    }

    public function getProprietario(){
    	return $this->proprietario;
    }

    public function setProprietario($proprietario){
    	$this->proprietario = $proprietario;
    }	

}