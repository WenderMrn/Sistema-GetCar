<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_ponto_locacao extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nome' => array(
                                'type' => 'TEXT',
                                'constraint' => '500',
                        ),
                        'endereco' => array(
                                'type' => 'TEXT',
                                'constraint' => '500',
                        )
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('ponto_locacao');

        }

        public function down()
        {
                $this->dbforge->drop_table('ponto_locacao');
        }
}