<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create($articleId): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $article = Article::findOrFail($articleId);

        return view('comments.create', compact('article'));
    }

    public function store(Request $request, $articleId)
    {
        $request->validate([
            'description' => 'required|string|min:3',
        ]);
        Comment::create([
            'user_id' => Auth::id(),
            'article_id' => $articleId,
            'description' => htmlspecialchars($request->description, ENT_QUOTES, 'UTF-8'),
        ]);

        return redirect()->route('articles.show', ['id' => $articleId])
            ->with('success', 'Commentaire ajouté avec succès');
    }
}
