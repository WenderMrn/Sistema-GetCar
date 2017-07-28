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

        $this->load->model('veiculo_model');
        $data['veiculos'] = $this->veiculo_model->getAll();

		$this->load->view('templates/panel_template/header');
		$this->load->view('painel/veiculo_list',$data);
		$this->load->view('templates/panel_template/footer');
       
    }

    public function veiculo_add(){

        $veiculo_data = $this->input->post();
            
        $this->load->view('templates/panel_template/header');
        $this->load->view('painel/veiculo_add', $veiculo_data);
        $this->load->view('templates/panel_template/footer');
    
    }


    public function veiculo_add_post(){
        $this->load->model('veiculo_model');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('placa', 'Placa', 'required|exact_length[8]',
            array('valida_placa' => 'Placa inválida.')
        );

        $this->form_validation->set_rules('renavam', 'RENAVAM', 'required|exact_length[11]|numeric',
            array('valida_renavam' => 'RENAVAM inválido.')
        );

        $this->form_validation->set_rules('modelo', 'Modelo', 'required',
            array('valida_modelo' => 'Modelo inválido.')
        );

        $this->form_validation->set_rules('categoria', 'Categoria', 'required',
            array('valida_categoria' => 'Categoria inválida.')
        );

        $this->form_validation->set_rules('marca', 'Marca', 'required',
            array('valida_marca' => 'Marca inválido.')
        );

        $this->form_validation->set_rules('cor', 'Cor', 'required',
            array('valida_cor' => 'Cor inválido.')
        );

        $this->form_validation->set_rules('chassi', 'Chassi', 'required|exact_length[17]',
            array('valida_chassi' => 'Chassi inválido.')
        );

        $this->form_validation->set_rules('portas', 'Portas', 'required',
            array('valida_portas' => 'Portas inválido.')
        );

        $this->form_validation->set_rules('ano', 'Ano', 'required',
            array('valida_ano' => 'Ano inválido.')
        );
        
        if ($this->form_validation->run() == TRUE){
            $this->veiculo_model->insert();
            $this->session->set_flashdata('success', 'Veículo cadastrado com sucesso!');
            redirect('painel/veiculos/','refresh');
        }else{
            $this->veiculo_add();
        }

    }
}