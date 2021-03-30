<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Status_pedido extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'auto_increment' => TRUE
                ),
                'titulo_status' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255
                )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('status_pedido',TRUE);
        
        $fields = array(
                'status' => array(
                        'name' => 'id_status',
                        'type' => 'INT',
                        'constraint' => 10
                )
        );
        $this->dbforge->modify_column('pedidos', $fields);
        $this->dbforge->add_column('pedidos',array(
                'CONSTRAINT `FK_status_pedidos` FOREIGN KEY (`id_status`) REFERENCES `status_pedidos` (`id`) ON DELETE SET NULL'
        ));
    }

    public function down() {
        $this->dbforge->drop_table('status_pedido',TRUE);
    }
}
