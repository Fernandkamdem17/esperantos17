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
        User::create([
            'username' => 'client',
            'password' => '1234'
        ]);
        User::create([
            'username' => 'client1',
            'password' => '12345'
        ]);
        User::create([
            'username' => 'client2',
            'password' => '123456'
        ]);
    }
}
