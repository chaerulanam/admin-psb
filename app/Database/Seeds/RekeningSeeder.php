<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RekeningSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_bank' => 'BRI Unit Sukaurip a.n Pesantren Al-Ishlah Tajug Nomor Rekening',
                'no_rekening'    => '420501004312530'
            ],
        ];
        // Using Query Builder
        $this->db->table('rekening')->insertBatch($data);
    }
}