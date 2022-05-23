<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' =>'justas',
            'email' => 'justinas.sadauskiu@gmail.com',
            'password' => Hash::make("123456789"),
            'is_admin' => true
        ]);
        DB::table('users')->insert([
            'name' =>'mantas',
            'email' => 'mantas@gmail.com',
            'password' => Hash::make("123456789"),

        ]);
        User::factory()->times(30)->create();
    }
}
