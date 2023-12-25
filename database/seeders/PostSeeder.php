<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed 3 posts, each with 3 comments
        Post::factory(3)->create()->each(function ($post) {
            // Create 3 comments for each post
            Comment::factory(3)->create(['post_id' => $post->id]);
        });
    }
}
