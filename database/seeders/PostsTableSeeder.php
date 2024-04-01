<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'user_id' => '1',
            'post_text' => 'text1'
        ];
        $post = new Post;
        $post->fill($param)->save();
        $param = [
            'user_id' => '2',
            'post_text' => 'text2'
        ];
        $post = new Post;
        $post->fill($param)->save();
        $param = [
            'user_id' => '3',
            'post_text' => 'text3'
        ];
        $post = new Post;
        $post->fill($param)->save();
    }
}
