<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $categories = Category::all();

        foreach($categories as $key => $c){

            for($i = 1; $i<=3; $i++){
                Post::create([
                    'title' => "POST $i",
                    'url_clean' => "post-$i",
                    'content' => 'Content PARA ESTE POST',
                    'posted' => 'yes',
                    'category_id' => $c->id
                ]);
            }
        }
    }
}
