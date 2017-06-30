<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user'))
        { 
            redirect('login');
        }
    }


    //AVALIAÇÕES ACTIONS (incompleto)
    public function index(){
    	$this->load->view('templates/shop_template/header');
		$this->load->view('shop/avaliacao');
		$this->load->view('templates/shop_template/footer');
	}

	public function avaliacao_list(){
		$this->load->model('avaliacao_model');

		return $this->avaliacao_model->getAll();
	}
}