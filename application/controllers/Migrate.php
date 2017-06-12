<?php

class Migrate extends CI_Controller
{

        public function index()
        {
                $this->load->library('migration');

                // $this->dbforge->drop_database($this->db->database);
                // $this->dbforge->create_database($this->db->database, TRUE);
                // $this->dbforge->drop_table('administrador', TRUE);

                if ($this->migration->current() === FALSE)
                {
                    show_error($this->migration->error_string());
                }else{
                	$this->db->truncate('administrador');
                	$admin_data = array(
                        'nome' => 'Administrador',
                        'email' => 'admin@',
                        'cpf' => '000.000.000-00',
                        'senha' => md5('123')
                	);

                	$this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Rafael Cruz',
                        'email' => 'rafael@',
                        'cpf' => '111.111.111-11',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Wender',
                        'email' => 'wender@',
                        'cpf' => '222.222.222-22',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Vicente Correia',
                        'email' => 'vicente@',
                        'cpf' => '333.333.333-33',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Lucas Schulze',
                        'email' => 'lucas@',
                        'cpf' => '444.444.444-44',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                	echo "Instalacao concluida";
                }
        }

}