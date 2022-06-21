<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
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
            'tagihan_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null'           => true,
            ],
            'no_invoice'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null' => true,
            ],
            'bukti'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null' => true,
            ],
            'rekening_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null' => true,
            ],
            'status'          => [
                'type'           => 'INT',
                'constraint'     => 5,
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
        $this->forge->addForeignKey('tagihan_id', 'tagihan', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('rekening_id', 'rekening', 'id', '', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
            $this->forge->dropForeignKey('tagihan', 'pembayaran_tagihan_id_foreign');
            $this->forge->dropForeignKey('rekening', 'pembayaran_rekening_id_foreign');
        } else {
            $this->forge->dropTable('pembayaran', true);
        }
    }
}