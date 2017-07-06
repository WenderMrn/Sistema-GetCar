<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Rel_ponto_to_adm extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id_ponto' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE
                        ),
                        'id_adm' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE
                        )
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_ponto) REFERENCES ponto_locacao(id)');
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_adm) REFERENCES administrador(id)');
                $this->dbforge->create_table('ponto_to_adm');

        }

        public function down()
        {
                $this->dbforge->drop_table('ponto_to_adm');
        }
}