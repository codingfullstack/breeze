<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('posts')->insert([
        //     'title' => Str::random(10),
        //     'user_id' =>1,
        //     'text' => Str::random(50),
        //     'photo' => 'post/test.jpg',
        // ]);
        // DB::table('posts')->insert([
        //     'title' => Str::random(10),
        //     'user_id' =>1,
        //     'text' => Str::random(50),
        //     'photo' => 'post/test.jpg',
        // ]);
        // DB::table('posts')->insert([
        //     'title' => Str::random(10),
        //     'user_id' =>1,
        //     'text' => Str::random(50),
        //     'photo' => 'post/test.jpg',
        // ]);
        // DB::table('posts')->insert([
        //     'title' => Str::random(10),
        //     'user_id' =>1,
        //     'text' => Str::random(50),
        //     'photo' => 'post/test.jpg',
        // ]);
        // DB::table('posts')->insert([
        //     'title' => Str::random(10),
        //     'user_id' =>1,
        //     'text' => Str::random(50),
        //     'photo' => 'post/test.jpg',
        // ]);
        // DB::table('posts')->insert([
        //     'title' => Str::random(10),
        //     'user_id' =>1,
        //     'text' => Str::random(50),
        //     'photo' => 'post/test.jpg',
        // ]);
        Post::factory()->times(25)->create();
    }
}
