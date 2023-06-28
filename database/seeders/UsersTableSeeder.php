<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'Admin1@example.test',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');
        
        $user = User::create([
            'name' => 'User',
            'email' => 'User1@example.test',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    
    }
}
