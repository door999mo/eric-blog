<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('PostTableSeeder');

        Model::reguard();
    }
}

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        \App\Post::truncate();
        for ($i = 0; $i < 20; $i++) {
            $post = new \App\Post();
            $post->setAttribute('title', $faker->sentence(mt_rand(3, 10)));
            $post->setAttribute('content', join("\n\n", $faker->paragraphs(mt_rand(3, 6))));
            $post->save();
        }
    }
}
