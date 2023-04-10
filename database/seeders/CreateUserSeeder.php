<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fullname' => 'Mustafa Akyıldız',
                'phone' => '+994 55 555 55 55',
                'email' => 'email@example.com',
                'password' => bcrypt('12345'),
                'role' => '0',
            ],
            [
                'fullname' => 'Mert Kaya',
                'phone' => '+90 210 103 35 63',
                'email' => 'mert@example.com',
                'password' => bcrypt('332211'),
                'role' => '0',
            ]            
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
