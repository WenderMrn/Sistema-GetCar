<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ponto_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('admin'))
        { 
            redirect('admin');
        }
    }

	public function index(){
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/index');
		$this->load->view('templates/panel_template/footer');
	}

	public function ponto_list(){

		$this->load->model('ponto_model');
		$id = $this->session->admin['id'];
		$data = array();
		$data['pontos'] = $this->ponto_model->getAll($id);


		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/ponto_list', $data);
		$this->load->view('templates/panel_template/footer');

	}

	public function ponto_add(){

		$ponto_data = $this->input->post();
			
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/ponto_add', $ponto_data);
		$this->load->view('templates/panel_template/footer');
	
	}

	public function ponto_add_post(){
		$this->load->model('ponto_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required',
        	array('valida_nome' => 'Nome inválido.')
        );

        $this->form_validation->set_rules('endereco', 'Endereço', 'required',
        	array('valida_nome' => 'Endereço inválido.')
        );
        
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
        
        if ($this->form_validation->run() == TRUE){
        	$this->ponto_model->insert();
            $this->session->set_flashdata('success', 'Ponto cadastrado com sucesso!');
        	redirect('painel/pontos/','refresh');
        }else{
        	$this->ponto_add();
        }

	}
	
}

