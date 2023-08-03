<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TokoMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_toko' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nama_toko' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_toko' => [
                'type'       => 'TEXT',
            ],
            'bujur' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'lintang' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'fitur_minuman_dingin' => [
                'type'       => 'ENUM',
                'constraint' => [ 'true', 'false' ],
            ],
            'fitur_es_krim' => [
                'type'       => 'ENUM',
                'constraint' => [ 'true', 'false' ],
            ],
            'fitur_gas_galon' => [
                'type'       => 'ENUM',
                'constraint' => [ 'true', 'false' ],
            ],
            'fitur_bensin' => [
                'type'       => 'ENUM',
                'constraint' => [ 'true', 'false' ],
            ],
            'fitur_pulsa' => [
                'type'       => 'ENUM',
                'constraint' => [ 'true', 'false' ],
            ],
            
        ]);
        $this->forge->addKey('id_toko', true);
        $this->forge->createTable('toko');
    }

    public function down()
    {
        $this->forge->dropTable('toko');
    }
}
