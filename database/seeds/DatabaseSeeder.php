<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\User;
use App\Post;
use App\Comment;

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
        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('CommentTableSeeder');

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

class RoleTableSeeder extends Seeder{

    public function run()
    {
        DB::table('roles')->truncate();

        Role::create([
            'id'            => Role::ADMIN,
            'name'          => 'Administrator',
            'description'   => 'Full access to create, edit, and update Post, comments and users.'
        ]);

        Role::create([
            'id'            => Role::USER,
            'name'          => 'User',
            'description'   => 'A standard user that can view post and make comments.'
        ]);
    }
}

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'role_id' => Role::ADMIN,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'role_id' => Role::USER,
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'role_id' => Role::USER,
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'password' => Hash::make('password')
            ]);
        }
    }
}

class CommentTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker\Factory::create();
        $posts = Post::all();
        foreach ($posts as $post) {
            for ($i = 0; $i < mt_rand(3, 10); $i++) {
                $user = User::orderByRaw("RAND()")->first();
                Comment::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'comment' => $faker->sentence(mt_rand(3, 10))
                ]);
            }
        }
    }
}