<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $user_password = Hash::make('admin');

        DB::table('users')->insert([
            'id' => $user_id,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'status' => 1,
            'fail_login_attempt' => 0,
            'created_at' => '2000-08-06 03:00:00',
        ]);

        DB::table('password_histories')->insert([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'user_id' => $user_id,
            'password' => $user_password
        ]);
    }
}
