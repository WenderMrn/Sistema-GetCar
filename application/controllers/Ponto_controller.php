<?php
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

defined('BASEPATH') OR exit('No direct script access allowed');

class Ponto_controller extends CI_Controller {

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
		$data['pontos'] = $this->ponto_model->getAll();
		
		 $this->load->view('templates/panel_template/header');
		 $this->load->view('painel/ponto_list', $data);
		 $this->load->view('templates/panel_template/footer');

	}

	public function ponto_show(){
		$this->load->model('ponto_model');
		
		$id = $this->uri->segment(3);

		
		$result = $this->ponto_model->getById($id);
		
		if(!empty($result)){
			$data['ponto'] = $result;
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/ponto_show', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->ponto_list();
		}
	}

	public function ponto_edit(){

		$this->load->model('ponto_model');
		
		$id = $this->uri->segment(4);

		
		$result = $this->ponto_model->getById($id);
		
		if(!empty($result)){
			$data['ponto'] = $result;
			
			$this->load->view('templates/panel_template/header');
			$this->load->view('painel/ponto_edit', $data);
			$this->load->view('templates/panel_template/footer');
		}else{
			$this->ponto_list();
		}
	}

	public function ponto_edit_post(){
		$this->load->model('ponto_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required',
        	array('valida_nome' => 'Nome inválido.')
        );

        $this->form_validation->set_rules('endereco', 'Endereço', 'required',
        	array('valida_endereco' => 'Endereço inválido.')
        );
        
        if ($this->form_validation->run() == TRUE){
        	$this->ponto_model->update();
            $this->session->set_flashdata('success', 'Ponto atualizado com sucesso!');
        	redirect('painel/pontos/','refresh');
        }else{
        	$this->ponto_list();
        }

	}

	public function ponto_add(){

		$ponto_data = $this->input->post();
			
		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/ponto_add', $ponto_data);
		$this->load->view('templates/panel_template/footer');
	
	}

	public function ponto_delete_post(){

		$this->load->model('ponto_model');

        if ($this->ponto_model->delete()){
            $this->session->set_flashdata('success', 'Ponto deletado com sucesso!');
        }
        redirect('painel/pontos','refresh');
	
	}

	public function ponto_add_post(){
		$this->load->model('ponto_model');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required',
        	array('valida_nome' => 'Nome inválido.')
        );

        $this->form_validation->set_rules('endereco', 'Endereço', 'required',
        	array('valida_endereco' => 'Endereço inválido.')
        );
        
        if ($this->form_validation->run() == TRUE){
        	$this->ponto_model->insert();
            $this->session->set_flashdata('success', 'Ponto cadastrado com sucesso!');
        	redirect('painel/pontos/','refresh');
        }else{
        	$this->ponto_add();
        }

	}
	
}

