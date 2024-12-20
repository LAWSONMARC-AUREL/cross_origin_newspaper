<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Comment;
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
                'author_id' => Author::inRandomOrder()->first()->id,
            ]);
        }
    }
}
