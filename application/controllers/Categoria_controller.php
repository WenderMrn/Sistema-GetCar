<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria_controller extends CI_Controller {


	public function add()
	{
		// Instancia o objeto Categoria
		$categoria = new Entity\Categoria();

		// Define um nome para a categoria
	    $categoria->setNome('Teste 2');

		// Aplica a persistência dos dados e executa a inserção no banco
	    $this->doctrine->em->persist($categoria);
	    $this->doctrine->em->flush();
	}

	public function addProduto(){

		$categoria = $this->doctrine->em->find('Entity\Categoria', 5);

		// instanciamos um novo produto (mais uma vez, obrigado autoload!)
		$produto = new Entity\Produto();
		 
		//setamos o nome deste produto
		$produto->setNome('dvd');
		 
		/**
		 * 
		 * Aqui acontece uma mágica. Já recuperamos o objeto da categoria que desejamos,
		 * basta adicioná-lo agora ao produto, através do método setCategoria
		 */
		$produto->setCategoria($categoria);
		 
		// aqui já está dominado, certo?
		$this->doctrine->em->persist($produto);
		$this->doctrine->em->flush();
	}

	public function getProduto(){
		$produto = $this->doctrine->em->find('Entity\Produto', 7);
 
		// Ok, você já sabe o que isto faz
		$nome = $produto->getNome();
		 
		/**
		 * 
		 * Isto é novo! Acessando a função getCategoria() dentro da entidade Produto
		 * uma vez que esta faz referência à entidade Categoria, posso então acessar
		 * TODO E QUALQUER método da entidade Categoria. 
		 * 
		 * Lembre-se. O getNome da linha 14 faz referência à entidade Produto,
		 * já o getNome da linha abaixo faz referência à classe Categoria
		 */
		$categoria = $produto->getCategoria()->getNome();
		 
		//para encerrar, apresento os dois dados capturados.
		 
		echo $nome . "<br />";
		echo $categoria;
	}

	public function dell(){

		$excluir = $this->doctrine->em->find('Entity\Categoria', 5);

		$this->doctrine->em->remove($excluir);
		$this->doctrine->em->flush();
	}
}