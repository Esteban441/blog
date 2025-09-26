<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Lucio Acuña',
                'email' => 'lucio@gmail.com',
                'password' => bcrypt(123123123),
            ],
            [
                'name' => 'Matias Fatalini',
                'email' => 'matias@gmail.com',
                'password' => bcrypt(123123123),
            ],
        ];

        foreach ($users as $user) {
            $userSave = new User();
            $userSave->name = $user['name'];
            $userSave->email = $user['email'];
            $userSave->password = $user['password'];
            $userSave->save();
        }
    }
}
