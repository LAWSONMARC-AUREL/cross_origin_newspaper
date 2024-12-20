<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(?string $source = null): JsonResponse
    {

        if ($source) {
            $articles = Article::where('source', strtoupper($source))->get();
        } else {
            $articles = Article::all();
        }

        if ($articles->isEmpty()) {
            return response()->json(['message' => 'Aucun article trouvé'], 200);
        }

        return response()->json($articles, 200);
    }

    public function list(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $articles = Article::where('title', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%")
                ->orderBy('published_at', 'desc')
                ->get();
        } else {
            $articles = Article::orderBy('published_at', 'desc')->get();
        }

        if ($articles->isEmpty()) {
            return view('listArticles', ['message' => 'Aucun article trouvé']);
        }

        return view('listArticles', ['articles' => $articles]);
    }

    public function show($id)
    {
        return view('showArticle', ['article' => Article::find($id)]);
    }
}
