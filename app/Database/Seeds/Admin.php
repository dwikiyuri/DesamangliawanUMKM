<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('desamangliawan', PASSWORD_DEFAULT),
            'nama_lengkap' => 'Admin',
            'email' => 'desamangliawan@gmail.com'
        ];
        $this->db->table('admin')->insert($data);
    }
}
