<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_avaliacao extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'satisfacao' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        ),
                        'comentario' => array(
                                'type' => 'TEXT',
                                'constraint' => '500',
                        ),
                        'usuario_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                        )
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('avaliacao');

        }

        public function down()
        {
                $this->dbforge->drop_table('avaliacao');
        }
}