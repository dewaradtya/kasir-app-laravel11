<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Mas Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'Mas Kasir',
                'email' => 'kasir@gmail.com',
                'role' => 'kasir',
                'password' => bcrypt('123456'),
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
