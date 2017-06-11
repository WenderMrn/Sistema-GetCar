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
                        'email' => 'admin@admin',
                        'cpf' => '000-000-000-00',
                        'senha' => md5('123456')
                	);

                	$this->db->insert('administrador', $admin_data);
                	echo "Instalacao concluida";
                }
        }

}