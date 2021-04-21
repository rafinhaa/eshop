<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Sandbox_pagseguro extends CI_Migration {

    public function up() {
        $fields = array(
                'sandbox' => array(
                        'type' => 'TINYINT',
                        'constraint' => 1,
                        'default' => 0
                )
        );
        $this->dbforge->add_column('config_pagseguro', $fields);
    }

    public function down() {
       $this->dbforge->drop_column('config_pagseguro', 'sandbox');
    }
}
