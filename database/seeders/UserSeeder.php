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
        if(User::where('level', User::$ADMIN_LEVEL)->count() == 0) {
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

        for($i = 0; $i < 100; $i++) {

            User::create([
                'first_name' => 'user ' . $i,
                'last_name' => 'user ' . $i,
                'phone' => $i < 10 ? '0912333330' . $i : '091233333' . $i,
                'password' => Hash::make("123456"),
                'level' => User::$USER_LEVEL,
                'status' => User::$ACTIVE
            ]);
        }

    }
}
