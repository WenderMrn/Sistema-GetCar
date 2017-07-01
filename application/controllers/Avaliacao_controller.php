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
        $user = $this->session->userdata('user');
        $this->load->model('avaliacao_model');

        $data = array();
        $avaliacoes = $this->avaliacao_model->verificar_avaliacao($user['id']);
        $data['status_avaliacao'] = $avaliacoes;
        $this->load->view('templates/shop_template/header');
		$this->load->view('shop/avaliacao', $data);
		$this->load->view('templates/shop_template/footer');
	}

   

	public function avaliacao_list(){
		$this->load->model('avaliacao_model');

		return $this->avaliacao_model->getAll();
	}

    public function register_avaliacao(){
        if($this->addAvaliacao()){
            $this->session->set_flashdata('success_avaliacao', 'Agradecemos sua avaliação!');
            redirect('shop/avaliacao','refresh');
        }
        $this->load->view('templates/shop_template/header');
        $this->load->view('shop/avaliacao', $this->input->post());
        $this->load->view('templates/shop_template/footer');
       
    }
	public function addAvaliacao(){
		
		$this->load->model('avaliacao_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('comentario', 'Comentário', 'required','');

         $this->form_validation->set_rules('satisfacao', 'Satisfação', 'required','');

         $avaliacoes = $this->avaliacao_model->getAll();

        if ($this->form_validation->run() == TRUE){
            $this->avaliacao_model->insert();
            return true;
        }
        return false;
        }

}