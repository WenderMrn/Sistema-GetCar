<?php

class Migrate extends CI_Controller
{

        public function index()
        {
                $this->load->library('migration');

                // $this->dbforge->drop_database($this->db->database);
                // $this->dbforge->create_database($this->db->database, TRUE);
                // $this->dbforge->drop_table('administrador', TRUE);

                if ($this->migration->version(1) === FALSE)
                {
                    show_error($this->migration->error_string());
                }else{
                    $this->db->truncate('administrador');
                	// $this->db->truncate('usuario');
                	
                    $admin_data = array(
                        'nome' => 'Administrador',
                        'email' => 'admin@admin.com',
                        'cpf' => '000.000.000-00',
                        'senha' => md5('123')
                	);

                	$this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Rafael Cruz',
                        'email' => 'rafael@admin.com',
                        'cpf' => '111.111.111-11',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Wender',
                        'email' => 'wender@admin.com',
                        'cpf' => '222.222.222-22',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Vicente Correia',
                        'email' => 'vicente@admin.com',
                        'cpf' => '333.333.333-33',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Lucas Schulze',
                        'email' => 'lucas@admin.com',
                        'cpf' => '444.444.444-44',
                        'senha' => md5('123')
                    );

                    $this->db->insert('administrador', $admin_data);

                    echo "<h3>Migração administrador concluida</h3>";
                }

                if ($this->migration->version(2) === FALSE)
                {
                    show_error($this->migration->error_string());
                }else{
                	echo "<h3>Migração usuario concluida</h3>";
                }
        }

}