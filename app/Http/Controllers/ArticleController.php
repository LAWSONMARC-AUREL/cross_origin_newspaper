<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function index(?string $source = null): JsonResponse
    {
        if ($source) {
//            dd(Article::where('source',strtoupper($source))
//                ->where('title',"Une #8 - L'Equipe")->first()->get('category_id'));
            $articles = Article::where('source', strtoupper($source))->get();
        } else {
            $articles = Article::all();
        }

        if ($articles->isEmpty()) {
            return response()->json(['message' => 'Aucun article trouvé'], 200);
        }

        return response()->json($articles, 200);
    }


    public function list(){

    }

}
