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
        User::insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password'), // Replace with a secure password
                'telephone' => '1234567890',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567891',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'Admin@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567892',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567893',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Member User',
                'email' => 'member@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567894',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'juser@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567895',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zlatan Ibrahimovic',
                'email' => 'zlatan.ibrahimovic@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567896',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cristiano Ronaldo',
                'email' => 'cristiano.ronaldo@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567897',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos Vinícius',
                'email' => 'carlos.vinicius@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567898',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Heung Min Son',
                'email' => 'heung.min.son@example.com',
                'password' => bcrypt('password'),
                'telephone' => '1234567899',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lionel Messi',
                'email' => 'lionel.messi@example.com',
                'password' => bcrypt('password'),
                'telephone' => '2234567890',
                'address' => 'Calle 123, Ciudad, País',
                'company' => 'Mi Empresa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
