<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Users_schema extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'MEDIUMINT',
                        'constraint' => 8,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 20
                ),
                'description' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100
                )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('groups',TRUE);

        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'MEDIUMINT',
                        'constraint' => 8,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'ip_address' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 45
                ),
                'description' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100
                ),
                'login' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100
                ),
                'time' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'null' => TRUE,
                        'default' => NULL
                )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('login_attempts',TRUE);
        
        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'ip_address' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 45
                ),
                'username' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                        'null' => TRUE,
                        'default' => NULL
                ),
                'password' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100
                ),
                'email' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 254,
                ),
                'activation_selector' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255,                        
                        'null' => TRUE
                ),
                'activation_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255,                        
                        'null' => TRUE
                ),
                'forgotten_password_selector' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255,                        
                        'null' => TRUE
                ),
                'forgotten_password_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255,                        
                        'null' => TRUE
                ),
                'forgotten_password_time' => array(
                        'type' => 'INT',
                        'constraint' => 11,                        
                        'unsigned' => TRUE,                        
                        'null' => TRUE
                ),
                'remember_selector' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255,
                        'null' => TRUE
                ),
                'remember_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 255,                        
                        'null' => TRUE
                ),
                'created_on' => array(
                        'type' => 'INT',
                        'constraint' => 11,                        
                        'unsigned' => TRUE,
                        'null' => FALSE
                ),
                'last_login' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                ),
                'active' => array(
                        'type' => 'TINYINT',
                        'constraint' => 1,  
                        'unsigned' => TRUE,                      
                        'null' => TRUE
                ),
                'first_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,                        
                        'null' => TRUE
                ),
                'last_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,                        
                        'null' => TRUE
                ),
                'company' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,                        
                        'null' => TRUE
                ),
                'phone' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 20,                        
                        'default' => 'NULL',
                        'null' => TRUE
                ),
                'UNIQUE KEY `uc_email` (`email`)',
                'UNIQUE KEY `uc_activation_selector` (`activation_selector`)',
                'UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`)',
                'UNIQUE KEY `uc_remember_selector` (`remember_selector`)'
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users',TRUE);

        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'user_id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE
                ),
                'group_id' => array(
                        'type' => 'MEDIUMINT',
                        'constraint' => 8,
                        'unsigned' => TRUE
                ),
                'UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`)',
                'KEY `fk_users_groups_users1_idx` (`user_id`)',
                'KEY `fk_users_groups_groups1_idx` (`group_id`)',
                'CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION',
                'CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION'
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users_groups',TRUE);

        $data = array(
                array('id' => "1",
                        'name' => "admin",
                        'description' => "Administrator"), 
                array('id' => "2",
                        'name' => "members",
                        'description' => "General User") 
        );
        $this->db->insert_batch('groups', $data);

        $data = array(
                array(
                        'id' => "1",
                        'username' => "Administrator",
                        'password' => "7ydZ6dRfxweWSERELeKmquQugcylbhosNUn6rSh3QUJgfMyvBeRYK",
                        'email' => "admin@admin.com",
                        'activation_code' => NULL,
                        'forgotten_password_selector' => '',
                        'forgotten_password_code' => NULL,
                        'remember_selector' => NULL,
                        'remember_code' => NULL,
                        'created_on' => 1268889823,
                        'last_login' => 1616275618,
                        'active' => 1,
                        'first_name' => 'Rafael',
                        'last_name' => 'Soncine',
                        'company' => 'ADMIN',
                        'phone' => '0'
                )           
                
        );
        $this->db->insert_batch('users', $data);

        $data = array(
                array(
                        'id' => "1",
                        'user_id' => "1",
                        'group_id' => "1",
                ),
                array(
                        'id' => "2",
                        'user_id' => "1",
                        'group_id' => "2",
                )           
                
        );
        $this->db->insert_batch('users_groups', $data);
    }

    public function down() {
        $this->dbforge->drop_database('groups');
        $this->dbforge->drop_database('login_attempts');
        $this->dbforge->drop_database('users');
        $this->dbforge->drop_database('users_groups');
    }
}
