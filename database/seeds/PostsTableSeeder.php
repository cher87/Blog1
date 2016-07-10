<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->delete();

        $user = App\User::all()->first();

        App\Post::create([
        	'user_id'	=>	$user->getKey(),
        	'title'		=>	'Post title',
            'body'      =>  'Post body',
        ]);
    }
}
