<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert data ke table users
        DB::table('users')->insert([
            'name' => 'Administator',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Insert data untuk penanggung jawab
        DB::table('users')->insert([
            'name' => 'Penanggung Jawab',
            'username' => 'pjkoperasi',
            'password' => bcrypt('pjkop123'),
            'role' => 'pj',
        ]);
    }
}
