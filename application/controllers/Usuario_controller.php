<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

	//USER ACTIONS (incompleto)

	public function index(){

	}
	
	public function user_list(){
		$this->load->model('usuario_model');

		return $this->usuario_model->getAll();
	}

	public function getUserById($id){
		$this->load->model('usuario_model');

		$data = array();
		$result = $this->usuario_model->getById($id);
		
		if(!empty($result)){
			$user = $result[0];
			return $user;
		}
		return false;
	}

	public function editUser(){
		$this->load->model('usuario_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        
        if ($this->form_validation->run() == TRUE){
        	$this->usuario_model->update();
            $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
            return true;
        }
        return false;


	}

	public function register_user_home(){
		if($this->addUser()){
			$this->session->set_flashdata('success_register', 'O pré-cadastro foi realizado com sucesso, por favor, aguarde alguns minutos para efetuar o login, enquanto o sistema valida o seu cadastro.');
			redirect('home_controller/cadastrar','refresh');
		}
		$this->load->view('templates/panel_template/header');
		$this->load->view('cadastrar', $this->input->post());
		$this->load->view('templates/panel_template/footer');
	}

	public function addUser(){
		$this->load->model('usuario_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check',
        	array(
        		'email_check' => "Email já cadastrado"
        		)
        );
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|callback_cpf_check',
        	array(
        		'cpf_check' => "CPF já cadastrado"
        		)
        );
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('cartao_credito', 'Cartão de Crédito', 'required|numeric');
        
        if ($this->form_validation->run() == TRUE){
        	$this->usuario_model->insert();
        	return true;
        }
        return false;
	}

	public function email_check($email){
		$this->load->model('usuario_model');

		return $this->usuario_model->email_check($email);		
	}

	public function cpf_check($cpf){
		$this->load->model('usuario_model');

		return $this->usuario_model->cpf_check($cpf);		
	}

	public function deleteUser($id){
		$this->load->model('usuario_model');

        if ($this->usuario->delete()){
            $this->session->set_flashdata('success', 'Usuário deletado com sucesso!');
            return true;
        }
        


	}
	//END USER ACTIONS
}

