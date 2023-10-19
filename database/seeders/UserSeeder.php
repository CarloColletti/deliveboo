<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            [
                'name' => "ciccio",
                'email' => "ciccio@gmail.com",
                'password' => "12345678",
                'remember_token' => "",
            ],
            [
                'name' => "franco",
                'email' => "franco@gmail.com",
                'password' => "12345678",
                'remember_token' => "",
            ],
            [
                'name' => "ciro",
                'email' => "ciro@gmail.com",
                'password' => "12345678",
                'remember_token' => "",
            ],
            [
                'name' => "luca",
                'email' => "luca@gmail.com",
                'password' => "12345678",
                'remember_token' => "",
            ],
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->remember_token = $user['remember_token'];
            $newUser->save();
        }
    }
}
