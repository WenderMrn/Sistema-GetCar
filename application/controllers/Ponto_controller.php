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
	
}

