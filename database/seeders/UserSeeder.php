<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'admin',
            'last_name' => 'admin',
            'phone' => '09121111111',
            'password' => Hash::make("123456"),
            'level' => User::$ADMIN_LEVEL,
            'status' => User::$ACTIVE
        ]);
        
        User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'phone' => '09122222222',
            'password' => Hash::make("123456"),
            'level' => User::$USER_LEVEL,
            'status' => User::$ACTIVE
        ]);
    }
}
