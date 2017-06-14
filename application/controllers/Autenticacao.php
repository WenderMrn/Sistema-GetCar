<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/panel_template/header');
		$this->load->view('login');
		$this->load->view('templates/panel_template/footer');
	}

	public function login(){
		$this->load->view('templates/panel_template/header');
		$this->load->view('login');
		$this->load->view('templates/panel_template/footer');
	}

	public function validar_login(){

		$this->load->model('administrador');
        
		$result = $this->administrador->validate();
		
		if($result){
			$this->session->set_userdata($result);
			redirect('painel','refresh');
		}else{
			// $this->form_validation->set_message('invalid_pass_or_email', 'Email ou senha inválidos.');
			$this->session->set_flashdata('error_login', 'Email ou senha inválidos.');
			redirect('login','refresh');
		}
        
	}
}
