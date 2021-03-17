<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial_migration extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => FALSE,
                    'auto_increment' => TRUE
            ),
            'nome' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'id_categoriapai' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => TRUE
            ),
            'ativo' => array(
                    'type' => 'TINYINT',
                    'constraint' => 1
            ),
            'ultima_atualizacao' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => TRUE
            ),
            'meta_link' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('categorias');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cpf' => array(
                'type' => 'VARCHAR',
                'constraint' => 20
        ),
        'data_nascimento' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
        ),
        'cep' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'endereco' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'numero' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'bairro' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'complemento' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cidade' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'estado' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'senha' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'ativo' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'telefone' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'data_cadastro' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'ultima_atualizacao' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
        )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('clientes');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'titulo' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'empresa' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cep' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'complemento' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cidade' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'estado' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'bairro' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'complemento' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'telefone' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'p_destaque' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'data_atualizacao' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
        ),
        'endereco' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('config');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'cep_origem' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'somar_frete' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2'
        ),
        'data_atualizacao' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
        )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('config_correios');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'token' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cartao' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'boleto' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'transferencia' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'data_atualizacao' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
        )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('config_pagseguro');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'ativo' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'ultima_atualizacao' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
        )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('marcas');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'id_cliente' => array(
                'type' => 'INT',
                'constraint' => 11
        ),
        'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cpf' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cep' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'endereco' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'numero' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'bairro' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'complemento' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cidade' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'estado' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'total_produto' => array(
                'type' => 'DECIMAL',
                'constraint' => '15.2'
        ),
        'total_frete' => array(
                'type' => 'DECIMAL',
                'constraint' => '15.2'
        ),
        'total_pedido' => array(
                'type' => 'DECIMAL',
                'constraint' => '15.2'
        ),
        'status' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'data_cadastro' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'ultima_atualizacao' => array(
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => TRUE
        ),
        'cod_rastreio' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'forma_envio' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('pedidos');
    $this->dbforge->add_column('pedidos',[
        'CONSTRAINT pedidos_clientes_id_fk FOREIGN KEY (id_cliente) REFERENCES clientes (id) ON DELETE SET NULL',
    ]);
    }
}