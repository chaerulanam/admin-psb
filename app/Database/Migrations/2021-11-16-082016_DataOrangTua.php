<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataOrangTua extends Migration
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
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'pendidikan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'pekerjaan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'penghasilan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'hp_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'pendidikan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'pekerjaan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'penghasilan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'hp_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->addUniqueKey('user_id');
        $this->forge->createTable('orangtua');
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
            $this->forge->dropForeignKey('users', 'orangtua_user_id_foreign');
        } else {
            $this->forge->dropTable('orangtua', true);
        }
    }
}
