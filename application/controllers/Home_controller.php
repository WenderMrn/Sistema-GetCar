<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/home_template/header');
		$this->load->view('home');
		$this->load->view('templates/home_template/footer');
	}

	public function cadastrar(){
		$this->load->view('templates/panel_template/header');
		$this->load->view('cadastrar');
		$this->load->view('templates/panel_template/footer');
	}

}
