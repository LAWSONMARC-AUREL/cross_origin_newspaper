<div>
    @extends('layouts.app')
    @section('content')
        <div class="container h-50">
            <h1>Article : {{ $article->title }}</h1>

            <dl class="row">
                <dt class="col-sm-3">Titre</dt>
                <dd class="col-sm-9">{{ $article->title }}</dd>

                <dt class="col-sm-3">Contenu</dt>
                <dd class="col-sm-9">{{ $article->content }}</dd>

                <dt class="col-sm-3">Date de publication</dt>
                <dd class="col-sm-9">{{ $article->published_at }}</dd>

                <dt class="col-sm-3">Source</dt>
                <dd class="col-sm-9">{{ $article->source }}</dd>

                <dt class="col-sm-3">Catégorie</dt>
                <dd class="col-sm-9">{{ $article->category->name ?? 'Non défini' }}</dd>

                <dt class="col-sm-3">Auteur</dt>
                <dd class="col-sm-9">{{ $article->author->name ?? 'Non défini' }}</dd>
            </dl>
        </div>

        <div class="container mt-2">
            <div style="max-height: 300px; overflow-y: auto;">
                    @foreach($article->comments as $comment)
                            <div class="card mt-2">
                                <div class="card-title">
                                    <h3>{{ $comment->author->name }}</h3>
                                </div>
                                <div class="card-body">
                                    <p>{{ $comment->content }}</p>
                                </div>
                                <div class="card-footer">
                                    <p>Date de création: {{ $comment->created_at }}</p>
                                </div>

                            </div>

                    @endforeach
            </div>
        </div>
    @endsection
</div>
