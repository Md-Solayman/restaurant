<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'          => 'Shawon Sakil',
                'email'         => 'admin@gmail.com',
                'password'      => Hash::make('admin1234'),

            ]


        ];

        foreach ($data as $info) {
            Admin::create($info);
        }
    }
}
