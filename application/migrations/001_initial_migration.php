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
        ),
        'CONSTRAINT pedidos_clientes_id_fk FOREIGN KEY (id_cliente) REFERENCES clientes (id) ON DELETE SET NULL'
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('pedidos');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'id_pedido' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE
        ),
        'nome_item' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'quantidade' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'valor_unitario' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2'
        ),
        'valor_total' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2'
        ),
        'valor_total_item' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2'
        ),
        'CONSTRAINT `pedidos_item_pedidos_id_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE'
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('pedidos_item');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'id_marca' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE
        ),
        'id_categoria' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE
        ),
        'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'cod_produto' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'destaque' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'ativo' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'controlar_estoque' => array(
                'type' => 'TINYINT',
                'constraint' => 1
        ),
        'estoque' => array(
                'type' => 'INT',
                'constraint' => 11
        ),
        'data_cadastro' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'ultima_atualizacao' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE
        ),
        'peso' => array(
                'type' => 'INT',
                'constraint' => 11
        ),
        'ativo' => array(
                'type' => 'INT',
                'constraint' => 11
        ),
        'altura' => array(
                'type' => 'INT',
                'constraint' => 11
        ),
        'largura' => array(
                'type' => 'INT',
                'constraint' => 11
        ),
        'comprimento' => array(
                'type' => 'INT',
                'constraint' => 11
        ),
        'info' => array(
                'type' => 'longtext'
        ),
        'meta_link' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2'
        ),
        'CONSTRAINT `produtos_categorias_id_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)',
        'CONSTRAINT `produtos_marcas_id_fk` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`)',
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('produtos');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'id_produto' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE
        ),
        'foto' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'CONSTRAINT `fotos_produtos_id_fk` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`)'
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('produtos_fotos');

    $this->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE,
                'auto_increment' => TRUE
        ),
        'id_produto' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => FALSE
        ),
        'quant_vendidos' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
        ),
        'CONSTRAINT `FK_produtos_mais_vendidos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE'
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('produtos_mais_vendidos');

    }
}
