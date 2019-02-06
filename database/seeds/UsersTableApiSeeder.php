<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apiToken = str_random(32).time();
        User::create([
            'api_token' => $apiToken,
            'full_name' => 'Api',
            'email' => 'api@gmail.com',
            'password' => 123456,
            'user_type' => 'api',
            'mobile_no' => '0123456789',
            'sex' => 'male',
            'photo' => '',
            'address' => '',
        ]);
    }
}
