<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'firstname'=> 'admin',
                    'middlename'=> '.',
                    'lastname'=> '.',
                    'email'=> 'admin@yandex.ru',
                    'login'=> 'admin',
                    'password'=> Hash::make('admin2025'),
                    'tel'=> '88005553535',
                    'role'=> 'admin',
                    
                ],
            ]
        );
    }
}
