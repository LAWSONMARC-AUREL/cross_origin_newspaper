@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un commentaire pour l'article "{{ $article->title }}"</h1>

        <!-- Affichage des messages de succès ou erreur -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('comments.store', $article->id) }}" method="POST" class="p-3 border rounded" style="background-color: #fff5e6; border-color: #333;">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group mb-3">
                <label for="description" class="form-label" style="color: #ff7f32;">Votre commentaire</label>
                <textarea id="description" name="description" class="form-control" rows="4" required style="border: 2px solid #333;"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3" style="background-color: #ff7f32; border: none;">Poster le commentaire</button>
        </form>
    </div>
@endsection
