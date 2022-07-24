<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
        $faker = Faker::create();

        for($i = 0; 10 >= $i; $i++){

            $post = new Post;
            $post->title = $faker->sentence(10);
            $post->body = $faker->paragraph( 10 );
            $post->user_id = 1;
            $post->save();
        }
    }
}
