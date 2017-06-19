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
                        'senha' => md5('123456')
                	);

                	$this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Rafael Cruz',
                        'email' => 'rafael@admin.com',
                        'cpf' => '111.111.111-11',
                        'senha' => md5('123456')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Wender',
                        'email' => 'wender@admin.com',
                        'cpf' => '222.222.222-22',
                        'senha' => md5('123456')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Vicente Correia',
                        'email' => 'vicente@admin.com',
                        'cpf' => '333.333.333-33',
                        'senha' => md5('123456')
                    );

                    $this->db->insert('administrador', $admin_data);

                    $admin_data = array(
                        'nome' => 'Lucas Schulze',
                        'email' => 'lucas@admin.com',
                        'cpf' => '444.444.444-44',
                        'senha' => md5('123456')
                    );

                    $this->db->insert('administrador', $admin_data);

                    echo "<h3>Migração administrador concluida</h3>";
                }

                if ($this->migration->version(2) === FALSE)
                {
                    show_error($this->migration->error_string());
                }else{

                    $this->db->truncate('usuario');
                    // $this->db->truncate('usuario');
                    
                    $admin_data = array(
                        'nome' => 'Rodrigo da Silva',
                        'email' => 'user1@user.com',
                        'cpf' => '472.787.960-32',
                        'cep' => '58000-000',
                        'cartao_credito' => '4444444444444444',
                        'endereco' => 'Rua fulano de tal 44, Bairro Cicrano, Cidade Filomena, PB',
                        'aprovado' => 0,
                        'senha' => md5('123456')
                    );

                    $this->db->insert('usuario', $admin_data);

                    $admin_data = array(
                        'nome' => 'Filomena da Costa',
                        'email' => 'user2@user.com',
                        'cpf' => '028.895.360-68',
                        'cep' => '58000-000',
                        'cartao_credito' => '4444444444444444',
                        'endereco' => 'Rua fulano de tal 44, Bairro Cicrano, Cidade Filomena, PB',
                        'aprovado' => 0,
                        'senha' => md5('123456')
                    );

                    $this->db->insert('usuario', $admin_data);

                    $admin_data = array(
                        'nome' => 'Ednaldo Pereira',
                        'email' => 'user3@user.com',
                        'cpf' => '275.387.170-13',
                        'cep' => '58000-000',
                        'cartao_credito' => '4444444444444444',
                        'endereco' => 'Rua fulano de tal 44, Bairro Cicrano, Cidade Filomena, PB',
                        'aprovado' => 0,
                        'senha' => md5('123456')
                    );

                    $this->db->insert('usuario', $admin_data);

                    $admin_data = array(
                        'nome' => 'Niegas Barros',
                        'email' => 'user4@user.com',
                        'cpf' => '254.464.300-50',
                        'cep' => '58000-000',
                        'cartao_credito' => '4444444444444444',
                        'endereco' => 'Rua fulano de tal 44, Bairro Cicrano, Cidade Filomena, PB',
                        'aprovado' => 0,
                        'senha' => md5('123456')
                    );

                    $this->db->insert('usuario', $admin_data);

                    $admin_data = array(
                        'nome' => 'Marlon Eugenio',
                        'email' => 'user5@user.com',
                        'cpf' => '279.330.370-46',
                        'cep' => '58000-000',
                        'cartao_credito' => '4444444444444444',
                        'endereco' => 'Rua fulano de tal 44, Bairro Cicrano, Cidade Filomena, PB',
                        'aprovado' => 0,
                        'senha' => md5('123456')
                    );

                    $this->db->insert('usuario', $admin_data);

                	echo "<h3>Migração usuario concluida</h3>";
                }


                if ($this->migration->version(3) === FALSE)
                {
                    show_error($this->migration->error_string());
                }else{

                    $this->db->truncate('avaliacao');
                    // $this->db->truncate('usuario');
                    
                    $admin_data = array(
                        'satisfacao' => 5,
                        'comentario' => 'Esse sistema é demais! Estou alugando 5 carros por dia! Eu poderia comprar um? Podia, mas esse sistema é tão bom que vou continuar alugando enquanto estiver vivo!',
                        'usuario_id' => 1 
                    );

                    $this->db->insert('avaliacao', $admin_data);
                    
                    $admin_data = array(
                        'satisfacao' => 2,
                        'comentario' => 'Odiei, pq não tenho dinheiro para alugar esses carros lindos!',
                        'usuario_id' => 2 
                    );

                    $this->db->insert('avaliacao', $admin_data);
                    
                    $admin_data = array(
                        'satisfacao' => 5,
                        'comentario' => 'Massa geral!',
                        'usuario_id' => 3 
                    );

                    $this->db->insert('avaliacao', $admin_data);
                    
                    $admin_data = array(
                        'satisfacao' => 3,
                        'comentario' => 'Adorei! Sistema SHOW! Voltarei mais vezes, com certeza! Mas dei 3 estrelas pq eu quis.',
                        'usuario_id' => 4 
                    );
                    $this->db->insert('avaliacao', $admin_data);

                    $admin_data = array(
                        'satisfacao' => 5,
                        'comentario' => 'AAAAMEEEEEEEIIIIIIIIIIIIIIII!',
                        'usuario_id' => 5 
                    );
                    $this->db->insert('avaliacao', $admin_data);

                    

                    echo "<h3>Migração avaliacao concluida</h3>";
                }
        }

}