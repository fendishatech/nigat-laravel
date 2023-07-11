<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "first_name" => "john",
            "last_name" => "doe",
            "email" => "john@gmail.com",
            "phone_no" => "0911121314",
            "password" => Hash::make("123ABCdef@"),
            "user_role" => "admin"
        ]);
    }
}
