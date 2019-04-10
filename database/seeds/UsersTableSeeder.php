<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'api_token' => '',
            'full_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 123456,
            'user_type' => 'admin',
            'mobile_no' => '0123456789',
            'sex' => 'male',
            'photo' => '',
            'address' => '',
        ]);
        User::create([
            'api_token' => '',
            'full_name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => 123456,
            'user_type' => 'admin',
            'mobile_no' => '0123456789',
            'sex' => 'male',
            'photo' => '',
            'address' => '',
        ]);
        User::create([
            'api_token' => '',
            'full_name' => 'Admin',
            'email' => 'admin2@gmail.com',
            'password' => 123456,
            'user_type' => 'admin',
            'mobile_no' => '0123456789',
            'sex' => 'male',
            'photo' => '',
            'address' => '',
        ]);
        User::create([
            'api_token' => '',
            'full_name' => 'Admin',
            'email' => 'admin3@gmail.com',
            'password' => 123456,
            'user_type' => 'admin',
            'mobile_no' => '0123456789',
            'sex' => 'male',
            'photo' => '',
            'address' => '',
        ]);
        User::create([
            'api_token' => '',
            'full_name' => 'Admin',
            'email' => 'admin4@gmail.com',
            'password' => 123456,
            'user_type' => 'admin',
            'mobile_no' => '0123456789',
            'sex' => 'male',
            'photo' => '',
            'address' => '',
        ]);
    }
}
