<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public string $baseUrl = 'https://api-catch-the-dev.unit41.fr/';

    public function fetchLemonde(): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\Foundation\Application
    {
        $response = Http::get($this->baseUrl.'lemonde');
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
                    'source' => strtoupper('LEMONDE'),
                ]);

                $article->category()->associate($category->id);
                $article->author()->associate($author->id);
                $article->save();

            }
        }

        return redirect('/articles/lemonde');
    }

    public function fetchLequipe(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $token=env('API_TOKEN');
        //$response= Http::withToken('vQS97b12DxqeAqs15CbvSQdmBP13')->get($this->baseUrl.'lequipe');
        $response =  Http::get($this->baseUrl.'lequipe?token='.$token);
        if($response->successful()){
            $json = $response->json();
            foreach ($json['data'] as $item) {
                $name= $item['author']['first_name'].' '.$item['author']['last_name'];
                $author = DB::table('authors')
                    ->whereRaw('UPPER(name) = ?', [strtoupper($name)])
                    ->first();

                if ($author == null) {
                    $author = Author::create([
                        'name' => $name,
                    ]);
                }
                $category = Category::whereRaw('UPPER(name) = ?', [strtoupper($item['category']['name'])])->first();
                if ($category == null) {
                    $category = Category::create([
                        'name' => $item['category']['name'],
                    ]);
                }
                $d= new DateTime($item['created_at']);
                $article = Article::create([
                    'title' => $item['title'],
                    'content' => $item['content'],
                    'published_at' => date_format($d,'Y-m-d H:i:s'),
                    'source' => strtoupper("LEQUIPE"),
                ]);

                $article->category()->associate($category->id);
                $article->author()->associate($author->id);
                $article->save();

            }

        }
        return redirect('/articles/lequipe');
    }
}
