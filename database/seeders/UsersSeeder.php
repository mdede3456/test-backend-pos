<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
            [
                'name'      => 'Dede Hidayatullah',
                'email'      => 'mdede@gmail.com',
                'store_id'   => null,
                'cabang_id' => null, 
                'jabatan'   => "Admin Website",
                "photo"     => "uploads/image.jpg",
                "role"      => "admin",
                "password"  => Hash::make("11223344")
            ]
        ];

        User::insert($data);
    }
}
