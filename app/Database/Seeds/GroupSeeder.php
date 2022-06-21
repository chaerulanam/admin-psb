<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'superadmin',
                'description'    => 'Manage All Users'
            ],
            [
                'name' => 'admin',
                'description'    => 'Manage Some Users'
            ],
            [
                'name' => 'santri',
                'description'    => 'Manage Self Account'
            ],
            [
                'name' => 'none',
                'description'    => 'Do Not Have Permission'
            ],
        ];
        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}