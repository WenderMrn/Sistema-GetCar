<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	//USER ACTIONS (incompleto)
	
	public function user_list(){
		$this->load->model('usuario');

		return $this->usuario->getAll();
	}

	public function user_edit(){
		$this->load->model('usuario');

		$id = $this->uri->segment(4);

		$data = array();
		$result = $this->usuario->getById($id);
		
		if(!empty($result)){
			$data['user_data'] = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/user_edit', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->user_list();
		}


	}

	public function user_edit_post(){
		$this->load->model('usuario');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        
        if ($this->form_validation->run() == TRUE){
        	$this->usuario->update();
            $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
        }

        redirect('painel/usuarios/editar/' . $this->input->post('id'),'refresh');


	}

	public function user_add(){

		$user_data = $this->input->post();
			
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/user_add', $user_data);
		$this->load->view('templates/panel_template/footer');
	
	}

	public function user_add_post(){
		$this->load->model('usuario');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        
        if ($this->form_validation->run() == TRUE){
        	$this->usuario->insert();
            $this->session->set_flashdata('success', 'Usuário cadastrado com sucesso!');
        	redirect('painel/usuarios/','refresh');
        }else{
        	$this->user_add();
        }

	}

	public function user_delete(){

		$this->load->model('usuario');

		$id = $this->uri->segment(4);

		$data = array();
		$result = $this->usuario->getById($id);
		
		if(!empty($result)){
			$data = $result[0];
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/user_delete', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->admin_list();
		}
	
	}

	public function admin_delete_post(){
		$this->load->model('usuario');

        if ($this->usuario->delete()){
            $this->session->set_flashdata('success', 'Usuário deletado com sucesso!');
        }
        redirect('painel/usuarios/','refresh');
        


	}
	//END USER ACTIONS
}

