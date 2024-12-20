<div>
    <!-- resources/views/articles/index.blade.php -->
    @extends('layouts.app')

    @section('content')
        <div class="container d-flex flex-column" style="flex: 1;">
            <h1>Liste des articles</h1>
            <form method="GET" action="{{ route('list') }}" class="mb-4">
                <div class="input-group">
                    <label class="form-label mb-2 me-2" for="search">
                        <input type="text" name="search" class="form-control" placeholder="Rechercher un article..." value="{{ request()->search }}">
                    </label>
                    <button class="btn btn-primary" type="submit">Rechercher</button>
                </div>
            </form>
            @if(isset($message))
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            @else
                <div style="flex:1;">
                    <ul class="list-group" style="overflow-y: auto; max-height: 48em">
                        @foreach($articles as $article)
                                    <li class="list-group-item">
                                        <a href="{{ route('articles.show', ['id' => $article->id]) }}" class="text-decoration-none">                                            <h3>{{ $article->title }}</h3>
                                            <p>Date de création: {{ $article->published_at }}</p>
                                            <p>{{ $article->content }}</p>
                                        </a>
                                    </li>

                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endsection
</div>
