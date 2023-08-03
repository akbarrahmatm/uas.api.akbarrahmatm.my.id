<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdukMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_toko' => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('prpduk');
    }
}
