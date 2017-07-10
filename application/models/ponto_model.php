<?php
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

defined('BASEPATH') OR exit('No direct script access allowed');

class Ponto_model extends CI_Model {
  
    public function insert()
        {

          $ponto = new Entity\Ponto();

          $ponto->setNome($_POST['nome']);
          $ponto->setEndereco($_POST['endereco']);

          $this->doctrine->em->persist($ponto);
          $this->doctrine->em->flush();

        }

        public function update()
        {
          $id = $_POST['id'];

          $ponto = $this->doctrine->em->find('Entity\Ponto', $id);

          $ponto->setNome($_POST['nome']);
          $ponto->setEndereco($_POST['endereco']);

          $this->doctrine->em->persist($ponto);
          $this->doctrine->em->flush();

        }

        public function getAll() 
        {

          $Repository = $this->doctrine->em->getRepository('Entity\Ponto');
          $pontos = $Repository->findAll();

          return $pontos;
        }

        public function getById($id)
        {

          $ponto = $this->doctrine->em->find('Entity\Ponto', $id);
          return $ponto;
        }

        public function delete($id = null)
        {

          if($id !== null){
                $ponto = $this->doctrine->em->find('Entity\Ponto', $id);            
            }elseif(isset($_POST['id'])){
               $ponto = $this->doctrine->em->find('Entity\Ponto', $_POST['id']);
            }
            $this->doctrine->em->remove($ponto);
            $this->doctrine->em->flush();
            return true;
        }

}

