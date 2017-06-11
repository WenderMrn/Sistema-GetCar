<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_administrador extends CI_Migration {

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
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'cpf' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'senha' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        )
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('administrador');

        }

        public function down()
        {
                $this->dbforge->drop_table('administrador');
        }
}