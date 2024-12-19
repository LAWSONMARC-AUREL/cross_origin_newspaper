<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function fetch(): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\Foundation\Application
    {
        $baseUrl = 'https://api-catch-the-dev.unit41.fr/';
        $newsPapers = ['lemonde'];

        foreach ($newsPapers as $newsPaper) {
            $response = Http::get($baseUrl.$newsPaper);
            if ($response->successful()) {
                $json = $response->json();
                foreach ($json['data'] as $item) {
                    $author = DB::table('authors')
                        ->whereRaw('UPPER(name) = ?', [strtoupper($item['author'])])
                        ->first();

                    if ($author == null) {
                        $author = Author::create([
                            'name' => $item['author'],
                        ]);
                    }

                    $category = Category::whereRaw('UPPER(name) = ?', [strtoupper($item['category'])])->first();
                    if ($category == null) {
                        $category = Category::create([
                            'name' => $item['category'],
                        ]);
                    }
                    $article = Article::create([
                        'title' => $item['title'],
                        'content' => $item['content'],
                        'published_at' => $item['published_at'],
                        'source' => strtoupper($newsPaper),
                    ]);

                    $article->category()->associate($category->id);
                    $article->author()->associate($author->id);
                    $article->save();

                }
            }
        }

        return redirect('/articles');
    }
}
