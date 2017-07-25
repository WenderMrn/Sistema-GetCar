<?php
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo_model extends CI_Model {
  
  public function insert()
  {

    $veiculo = new Entity\Veiculo();

    $veiculo->setPlaca($_POST['placa']);
    $veiculo->setMarca($_POST['marca']);
    $veiculo->setModelo($_POST['modelo']);
    $veiculo->setAno($_POST['ano']);
    $veiculo->setCategoria($_POST['categoria']);
    $veiculo->setChassi($_POST['chassi']);
    $veiculo->setRenavam($_POST['renavam']);
    $veiculo->setCor($_POST['cor']);
    $veiculo->setPortas($_POST['portas']);
    $veiculo->setAtivo($_POST['ativo']);

    $this->doctrine->em->persist($veiculo);
    $this->doctrine->em->flush();

  }

  public function update()
  {
    $id = $_POST['id'];

    $veiculo = $this->doctrine->em->find('Entity\Veiculo', $id);

    $veiculo->setPlaca($_POST['placa']);
    $veiculo->setMarca($_POST['marca']);
    $veiculo->setModelo($_POST['modelo']);
    $veiculo->setAno($_POST['ano']);
    $veiculo->setCategoria($_POST['categoria']);
    $veiculo->setChassi($_POST['chassi']);
    $veiculo->setRenavam($_POST['renavam']);
    $veiculo->setCor($_POST['cor']);
    $veiculo->setPortas($_POST['portas']);
    $veiculo->setAtivo($_POST['ativo']);

    $this->doctrine->em->persist($veiculo);
    $this->doctrine->em->flush();

  }

  public function getAll() 
  {

    $Repository = $this->doctrine->em->getRepository('Entity\Veiculo');
    $veiculos = $Repository->findAll();

    return $veiculos;
  }

  public function getById($id)
  {

    $veiculo = $this->doctrine->em->find('Entity\Veiculo', $id);
    return $veiculo;
  }

  public function delete($id = null)
  {

    if($id !== null){
      $veiculo = $this->doctrine->em->find('Entity\Veiculo', $id);            
    }elseif(isset($_POST['id'])){
     $veiculo = $this->doctrine->em->find('Entity\Veiculo', $_POST['id']);
   }
   $this->doctrine->em->remove($veiculo);
   $this->doctrine->em->flush();
   return true;
 }

}

