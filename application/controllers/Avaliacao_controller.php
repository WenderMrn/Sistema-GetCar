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
        $data = array();
        $data['status_avaliacao'] = $this->verificar_avaliacao();
        $this->load->view('templates/shop_template/header');
		$this->load->view('shop/avaliacao', $data);
		$this->load->view('templates/shop_template/footer');
        
  
	}

    public function verificar_avaliacao(){
       $this->load->model('avaliacao_model');

        $avaliacoes = $this->avaliacao_model->getAll();
        $user = $this->session->userdata('user');
        $dadosAvaliacao = array();

         foreach ($avaliacoes as $avaliacao) {
              if ($user['id'] == $avaliacao['usuario_id']) {
                $dadosAvaliacao['status'] = 1;
                $dadosAvaliacao['nota'] = $avaliacao['satisfacao'];
                $dadosAvaliacao['comentario'] = $avaliacao['comentario'];
              } else{
                $dadosAvaliacao['status'] = 0;
              } 
          }
        return $dadosAvaliacao; 
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