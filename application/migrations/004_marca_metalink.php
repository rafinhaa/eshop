<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Marca_metalink extends CI_Migration {

    public function up() {
        $fields = array(
                'meta_link' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255
                )
        );
        $this->dbforge->add_column('marcas', $fields);
    }

    public function down() {
       $this->dbforge->drop_column('marcas', 'meta_link');
    }
}
