<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('login');
        }
    }

	//USER ACTIONS (incompleto)

	public function index(){
		$this->load->view('templates/panel_template/header');
		$this->load->view('user/index');
		$this->load->view('templates/panel_template/footer');
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

        $this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[3]|callback_valida_nome|required',
        	array('valida_nome' => 'Nome inválido. (Insira seu nome completo)')
        );

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[8]|callback_email_check',
        	array(
        		'email_check' => "Email já cadastrado"
        		)
        );
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[11]|callback_valida_cpf|callback_cpf_check',
        	array(
        		'cpf_check' => 'CPF já cadastrado',
        		'valida_cpf' => 'CPF Inválido'
        		)
        );
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required|exact_length[9]');
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

	public function valida_cpf($cpf){
		$this->load->helper('tools');

		return validaCPF($cpf);

	}

	public function valida_nome($nome){
		$this->load->helper('tools');

		return validaNome($nome);

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

