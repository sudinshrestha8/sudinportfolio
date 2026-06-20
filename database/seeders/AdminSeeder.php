<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = $this->command->ask('Admin email', 'admin@example.com');
        $name  = $this->command->ask('Admin name', 'Admin');
        $password = $this->command->secret('Admin password');

        if (User::where('email', $email)->exists()) {
            $this->command->warn("A user with email [{$email}] already exists. Skipping.");
            return;
        }

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
            'role'     => 'admin',
        ]);

        $this->command->info("Admin user [{$email}] created successfully.");
    }
}
