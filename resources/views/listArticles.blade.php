<div>
    <!-- resources/views/articles/index.blade.php -->
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <h1>Liste des articles</h1>

            @if(isset($message))
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
            @else
                <div style="max-height: 450px; overflow-y: auto;">
                    <ul class="list-group">
                        @foreach($articles as $article)
                            <li class="list-group-item">
                                <h3>{{ $article->title }}</h3>
                                <p>Date de création: {{ $article->published_at }}</p>
                                <p>{{ $article->content }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endsection
</div>
