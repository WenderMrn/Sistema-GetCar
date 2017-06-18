<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Painel_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/index');
		$this->load->view('templates/panel_template/footer');
	}

	//ADMIN ACTIONS
	public function admin_list(){
		$this->load->model('administrador_model');

		$data = array();
		$data['administradores'] = $this->administrador_model->getAll();


		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/admin_list', $data);
		$this->load->view('templates/panel_template/footer');
	}

	public function admin_show(){
		$this->load->model('administrador_model');
		
		$id = $this->uri->segment(3);

		$data = array();
		$result = $this->administrador_model->getById($id);
		
		if(!empty($result)){
			$data = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/admin_show', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->admin_list();
		}
	}

	public function admin_edit(){
		$this->load->model('administrador_model');

		$id = $this->uri->segment(4);

		$data = array();
		$result = $this->administrador_model->getById($id);
		
		if(!empty($result)){
			$data = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/admin_edit', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->admin_list();
		}


	}

	public function admin_edit_post(){
		$this->load->model('administrador_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[3]|callback_valida_nome|required',
        	array('valida_nome' => 'Nome inválido. (Insira seu nome completo, sem numeros)')
        );

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[8]');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[11]|callback_valida_cpf',
        	array(
        		'user_cpf_check' => 'CPF já cadastrado',
        		'valida_cpf' => 'CPF Inválido'
        		)
        );

        if(!empty($this->input->post('senha'))) {
        	$this->form_validation->set_rules('senha', 'Senha', 'min_length[6]');
        }
        
        if ($this->form_validation->run() == TRUE){
        	$this->administrador_model->update();
            $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
        	redirect('painel/administradores/editar/' . $this->input->post('id'),'refresh');
        }

        $this->session->set_flashdata('errors', validation_errors());
        $this->load->view('templates/panel_template/header');
		$this->load->view('painel/admin_edit', $this->input->post());
		$this->load->view('templates/panel_template/footer');

	}

	public function admin_add(){

		$admin_data = $this->input->post();
			
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/admin_add', $admin_data);
		$this->load->view('templates/panel_template/footer');
	
	}

	public function admin_add_post(){
		$this->load->model('administrador_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[3]|callback_valida_nome|required',
        	array('valida_nome' => 'Nome inválido. (Insira seu nome completo, sem numeros)')
        );
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[8]|callback_admin_email_check',
        	array(
        		'admin_email_check' => 'Email já cadastrado'
        		)
        );
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[14]|callback_valida_cpf|callback_admin_cpf_check',
        	array(
        		'admin_cpf_check' => 'CPF já cadastrado',
        		'valida_cpf' => 'CPF Inválido'
        		)
        );
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
        
        if ($this->form_validation->run() == TRUE){
        	$this->administrador_model->insert();
            $this->session->set_flashdata('success', 'Administrador cadastrado com sucesso!');
        	redirect('painel/administradores/','refresh');
        }else{
        	$this->admin_add();
        }

	}

	public function admin_email_check($email){
		$this->load->model('administrador_model');

		return $this->administrador_model->email_check($email);		
	}

	public function admin_cpf_check($cpf){
		$this->load->model('administrador_model');

		return $this->administrador_model->cpf_check($cpf);		
	}

	public function admin_delete(){

		$this->load->model('administrador_model');

		$id = $this->uri->segment(4);

		$data = array();
		$result = $this->administrador_model->getById($id);
		
		if(!empty($result)){
			$data = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/admin_delete', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->admin_list();
		}
	
	}

	public function admin_delete_post(){
		$this->load->model('administrador_model');

        if ($this->administrador_model->delete()){
            $this->session->set_flashdata('success', 'Administrador deletado com sucesso!');
        }
        redirect('painel/administradores/','refresh');
        


	}
	//FIM ADMIN ACTIONS

	//USER ACTIONS
	public function user_list(){
		$this->load->model('usuario_model');

		$data = array();
		$data['usuarios'] = $this->usuario_model->getAll();


		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/user_list', $data);
		$this->load->view('templates/panel_template/footer');
	}

	public function user_show(){
		$this->load->model('usuario_model');
		
		$id = $this->uri->segment(3);

		$data = array();
		$result = $this->usuario_model->getById($id);
		
		if(!empty($result)){
			$data = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/user_show', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->user_list();
		}
	}

	public function user_edit(){
		$this->load->model('usuario_model');

		$id = $this->uri->segment(4);		

		$data = array();
		$result = $this->usuario_model->getById($id);
		
		if(!empty($result)){
			$data = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/user_edit', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->user_list();
		}


	}

	public function user_edit_post(){
		$this->load->model('usuario_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[3]|callback_valida_nome|required',
        	array('valida_nome' => 'Nome inválido. (Insira seu nome completo)')
        );

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[8]',
        	array(
        		'email_check' => "Email já cadastrado"
        		)
        );
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[11]|callback_valida_cpf',
        	array(
        		'user_cpf_check' => 'CPF já cadastrado',
        		'valida_cpf' => 'CPF Inválido'
        		)
        );

        if(!empty($this->input->post('senha'))) {
        	$this->form_validation->set_rules('senha', 'Senha', 'min_length[6]');
        }

        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required|exact_length[9]');
        $this->form_validation->set_rules('cartao_credito', 'Cartão de Crédito', 'required|numeric');
        
        if ($this->form_validation->run() == TRUE){
        	$this->usuario_model->update();
            $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
            redirect('painel/usuarios/editar/' . $this->input->post('id'),'refresh');
        }else{
            $this->session->set_flashdata('errors', validation_errors());

        }

        // redirect('painel/usuarios/editar/' . $this->input->post('id'),'refresh');
        // $this->user_edit($this->input->post('id'));
        $this->load->view('templates/panel_template/header');
		$this->load->view('painel/user_edit', $this->input->post());
		$this->load->view('templates/panel_template/footer');


	}

	public function user_add(){

		$user_data = $this->input->post();
			
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/user_add', $user_data);
		$this->load->view('templates/panel_template/footer');
	
	}

	public function user_add_post(){
		$this->load->model('usuario_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[3]|callback_valida_nome|required',
        	array('valida_nome' => 'Nome inválido. (Insira seu nome completo)')
        );

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[8]|callback_user_email_check',
        	array(
        		'email_check' => "Email já cadastrado"
        		)
        );
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[11]|callback_valida_cpf|callback_user_cpf_check',
        	array(
        		'user_cpf_check' => 'CPF já cadastrado',
        		'valida_cpf' => 'CPF Inválido'
        		)
        );
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required|exact_length[9]');
        $this->form_validation->set_rules('cartao_credito', 'Cartão de Crédito', 'required|numeric');
        
        if ($this->form_validation->run() == TRUE){
        	$this->usuario_model->insert();
            $this->session->set_flashdata('success', 'Usuário cadastrado com sucesso!');
        	redirect('painel/usuarios/','refresh');
        }else{
        	$this->user_add();
        }

	}

	public function user_email_check($email){
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


	public function user_cpf_check($cpf){
		$this->load->model('usuario_model');

		return $this->usuario_model->cpf_check($cpf);		
	}

	public function user_delete(){

		$this->load->model('usuario_model');

		$id = $this->uri->segment(4);

		$data = array();
		$result = $this->usuario_model->getById($id);
		
		if(!empty($result)){
			$data = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/user_delete', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->user_list();
		}
	
	}

	public function user_delete_post(){
		$this->load->model('usuario_model');

        if ($this->usuario_model->delete()){
            $this->session->set_flashdata('success', 'Usuário deletado com sucesso!');
        }
        redirect('painel/usuarios/','refresh');
	}

	public function search_users_json(){
		$this->load->model('usuario_model');

		$search = $this->input->post('search');

		$result = $this->usuario_model->searchByNameOrCpf($search);
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
		
	}

	
}
