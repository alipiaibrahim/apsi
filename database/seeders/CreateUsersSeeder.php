<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    
    public function run()
    {
        $user = [
            [
                'name' => 'isUser',
                'username' => 'isUser',
                'email' => 'mahasiswa@mail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 4
            ],
            [
                'name' => 'isDosen',
                'username' => 'isDosen',
                'email' => 'dosen@mail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 3
            ],
            [
                'name' => 'isKoordinator',
                'username' => 'isKoordinator',
                'email' => 'koordinator@mail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 2
            ],
            [
                'name' => 'isAdmin',
                'username' => 'isAdmin',
                'email' => 'prodi@mail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 1
            ]
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
