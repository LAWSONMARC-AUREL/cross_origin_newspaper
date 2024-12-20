<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        foreach ($articles as $article) {
            Comment::factory(2)->create([
                'article_id' => $article->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
