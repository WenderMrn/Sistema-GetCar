<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('login');
		$this->load->view('template/footer');
	}

	public function login(){
		
	}
}
