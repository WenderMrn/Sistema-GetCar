<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('user')){
			redirect('user_controller','refresh');
		}else if($this->session->userdata('admin')){
			redirect('painel_controller','refresh');
		}
	}

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
