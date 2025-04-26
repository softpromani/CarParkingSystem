<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'mobile_number' => '1234567896',
            'email' => 'admin@gmail.com',
            // you might also want to add email, password, etc. if your table needs them
        ]);

        // Assign the "admin" role
        $user->assignRole('admin');
    }
}
