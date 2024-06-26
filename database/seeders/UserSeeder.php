<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            // [
            //     'id'                => 1,
            //     'name'              => 'Krisostomus Nova Rahmanto',
            //     'email'             => 'direktur@mail.com',
            //     'email_verified_at' => \Carbon\Carbon::now(),
            //     'password'          => Hash::make('password'),
            //     'role'              => 'administrator',
            //     // 'status'            => 'active',
            //     'created_at'        => \Carbon\Carbon::now(),
            //     'updated_at'        => \Carbon\Carbon::now(),
            // ],
            // [
            //     'id'                => 2,
            //     'name'              => 'Elisabeth Cesaria Dwi Nuriskiyati',
            //     'email'             => 'test1@mail.com',
            //     'email_verified_at' => \Carbon\Carbon::now(),
            //     'password'          => Hash::make('password'),
            //     'role'              => 'admin',
            //     // 'status'            => 'active',
            //     'created_at'        => \Carbon\Carbon::now(),
            //     'updated_at'        => \Carbon\Carbon::now(),
            // ],
            [
                'id'                => 1,
                'name'              => 'WebDev Administrator',
                'email'             => 'webdev1@mail.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password'          => Hash::make('password'),
                'role'              => 'administrator',
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now(),
            ],
        ];

        \DB::table('users')->insert($users);
    }
}
