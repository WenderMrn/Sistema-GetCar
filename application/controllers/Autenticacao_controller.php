<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao_controller extends CI_Controller {

	public function login(){
		if($this->session->userdata('user')){
			redirect('user_controller','refresh');
		}else{
			$this->load->view('templates/panel_template/header');
			$this->load->view('login');
			$this->load->view('templates/panel_template/footer');
		}
		
	}

	public function admin_login(){
		if($this->session->userdata('admin')){
			redirect('painel_controller','refresh');
		}else{
			$this->load->view('templates/panel_template/header');
			$this->load->view('admin_login');
			$this->load->view('templates/panel_template/footer');
		}
	}

	public function validar_login(){

		$this->load->model('usuario_model');
        
		$result['user'] = $this->usuario_model->validate();
		
		if($result['user']){

			if($result['user']['id'] == 0){
				$this->session->set_flashdata('alert_login', 'Seu cadastro ainda está pendente. Aguarde um momento e tente novamente.');
				redirect('login', 'refresh');
			}elseif($result['user']['id'] == 2){
				$this->session->set_flashdata('error_login', 'Infelizmente seu cadastro foi negado. Por favor, contacte-nos para maiores informações.');
				redirect('login', 'refresh');
			}else{
				$this->session->set_userdata($result);
				redirect('usuario_controller','refresh');
			}
		}else{
			// $this->form_validation->set_message('invalid_pass_or_email', 'Email ou senha inválidos.');
			$this->session->set_flashdata('error_login', 'Email ou senha inválidos.');
			redirect('login', 'refresh');
		}
        
	}

	public function validar_admin_login(){

		$this->load->model('administrador_model');
        
		$result['admin'] = $this->administrador_model->validate();
			
		
		if($result['admin']){
			$this->session->set_userdata($result);
			redirect('painel_controller','refresh');
		}else{
			// $this->form_validation->set_message('invalid_pass_or_email', 'Email ou senha inválidos.');
			$this->session->set_flashdata('error_login', 'Email ou senha inválidos.');
			redirect('autenticacao_controller/admin_login', 'refresh');
		}
        
	}

	public function admin_logoff(){
		$this->session->unset_userdata('admin');
		redirect('admin','refresh');
	}

	public function logoff(){
		$this->session->unset_userdata('user');
		redirect('login','refresh');
	}
}
