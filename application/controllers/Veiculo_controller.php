<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin'))
        { 
            redirect('login');
        }
    }

  public function veiculo_list(){
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/veiculo_list');
		$this->load->view('templates/panel_template/footer');  
	}
}