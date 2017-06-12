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
		// var_dump($this->input->post());
		$this->load->view('templates/panel_template/header');
		$this->load->view('autenticacao/login');
		$this->load->view('templates/panel_template/footer');
	}

	public function validar_login(){

		$this->load->model('administrador');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('senha', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            redirect('login','refresh');
        }else{
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
}
