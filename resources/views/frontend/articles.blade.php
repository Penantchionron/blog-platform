@extends('layouts.vuePrincipal')
@section('title', 'Vidéos')

@section('content')
<main class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Articles</h2>
        <div class="row">
            @forelse ($contents as $content)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">{{ Str::limit($content->description, 100) }}</p>
                            <div class="mt-auto d-flex justify-content-between">

                                <!-- Si l'utilisateur est authentifié, il peut lire l'article -->
                                <a href="{{ route('content.stream', $content->id) }}" class="btn btn-outline-primary btn-sm">▶️ Lire</a>
                       
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Aucun contenu audio pour le moment.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection
