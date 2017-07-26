<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_veiculo extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'placa' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                        'marca' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'modelo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'ano' => array(
                                'type' => 'DATETIME'
                        ),
                        'categoria' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'chassi' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '17',
                        ),
                        'renavam' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '11',
                        ),
                        'cor' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'portas' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        ),
                        'ativo' => array(
                                'type' => 'BOOLEAN'
                        )
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('veiculo');

        }

        public function down()
        {
                $this->dbforge->drop_table('veiculo');
        }
}