<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function index(): JsonResponse
    {
        $articles = Article::all();

        if ($articles->isEmpty()) {
            return response()->json(['message' => 'Aucun article'], 200);
        }

        return response()->json($articles, 200);
    }
}
