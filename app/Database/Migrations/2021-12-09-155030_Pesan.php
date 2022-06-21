<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'judul'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'judul'       => [
                'type'       => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pesan');
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
        } else {
            $this->forge->dropTable('pesan', true);
        }
    }
}