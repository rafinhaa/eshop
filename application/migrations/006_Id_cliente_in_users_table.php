<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Id_cliente_in_users_table extends CI_Migration {

    public function up() {
        $fields = array(
                'id_cliente' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
            'CONSTRAINT fk_cliente FOREIGN KEY (id_cliente) REFERENCES clientes (id) ON DELETE CASCADE'
        );
        $this->dbforge->add_column('users', $fields);
    }

    public function down() {
       $this->dbforge->drop_column('config_pagseguro', 'id_cliente');
    }
}
