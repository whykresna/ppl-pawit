<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$3Xvqz59R87I//1nk5CIqx.VboI0FLqkj0q.sciLAL1oiCUfMVgRWe',
                'remember_token' => null,
                'phone_number'   => '',
            ],
        ];

        User::insert($users);
    }
}
