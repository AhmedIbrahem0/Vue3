<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(15)->create();

//    Post::create([
//        'name'=>'Post 1',
//       'description'=>'Description 1',
//            ]);Post::create([
//        'name'=>'Post 2',
//       'description'=>'Description 2',
//            ]);Post::create([
//        'name'=>'Post 3',
//       'description'=>'Description 3',
//            ]);Post::create([
//        'name'=>'Post 4',
//       'description'=>'Description 4',
//            ]);Post::create([
//        'name'=>'Post 5',
//       'description'=>'Description 5',
//            ]);Post::create([
//        'name'=>'Post 6',
//       'description'=>'Description 6',
//            ]);Post::create([
//        'name'=>'Post 7',
//       'description'=>'Description 7',
//            ]);Post::create([
//        'name'=>'Post 8',
//       'description'=>'Description 8',
//            ]);
    }
}
