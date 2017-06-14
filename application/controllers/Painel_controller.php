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

	public function admin_edit(){
		$this->load->model('administrador_model');

		$id = $this->uri->segment(4);

		$data = array();
		$result = $this->administrador_model->getById($id);
		
		if(!empty($result)){
			$data['admin_data'] = $result[0];
			
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

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        
        if ($this->form_validation->run() == TRUE){
        	$this->administrador_model->update();
            $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
        }else{
            $this->session->set_flashdata('errors', validation_errors());

        }

        redirect('painel/administradores/editar/' . $this->input->post('id'),'refresh');


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

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check',
        	array(
        		'email_check' => 'Email já cadastrado'
        		)
        );
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|callback_cpf_check',
        	array(
        		'cpf_check' => 'CPF já cadastrado'
        		)
        );
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        
        if ($this->form_validation->run() == TRUE){
        	$this->administrador_model->insert();
            $this->session->set_flashdata('success', 'Administrador cadastrado com sucesso!');
        	redirect('painel/administradores/','refresh');
        }else{
        	$this->admin_add();
        }

	}

	public function email_check($email){
		$this->load->model('administrador_model');

		return $this->administrador_model->email_check($email);		
	}

	public function cpf_check($cpf){
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

	
}
