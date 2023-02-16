<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Equipe Practice',
            'email' => 'practice@uffs.edu.br',
            'password' => 'dd',
            'uid' => 'practice',
            'cpf' => '000',
            'type' => User::NORMAL
        ]);

        User::create([
            'name' => 'Ryan Ten Caten',
            'email' => 'tencatenryan@proton.me',
            'password' => 'dd',
            'uid' => 'ryan.caten',
            'cpf' => '000',
            'type' => User::ADMIN
        ]);        
    }
}
