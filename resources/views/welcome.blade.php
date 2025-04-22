@extends('layouts.vuePrincipal')

@section('title', 'Accueil')
@section('content')
<main class="py-5">
    <div class="container">
        <h1 class="mb-4 text-center">🎉 Bienvenue sur notre plateforme</h1>

        <div class="row">
            @forelse ($contents as $content)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <span class="badge bg-secondary text-uppercase mb-2">{{ $content->type }}</span>
                            <p class="card-text">{{ Str::limit($content->description, 100) }}</p>

                            @php
                            // Définir la route en fonction du type de contenu
                            $routeName = match ($content->type) {
                                'videos' => 'frontend.videos',  // Remplace 'videos.show' par 'frontend.videos'
                                'audios' => 'frontend.audios',  // Remplace 'audios.show' par 'frontend.audios'
                                'articles' => 'frontend.articles',  // Remplace 'articles.show' par 'frontend.articles'
                                'pdf' => 'frontend.pdf',  // Remplace 'pdf.show' par 'frontend.pdfs'
                                default => null,
                            };
                        @endphp
                        @if ($routeName)
                          @auth
                            <a href="{{ route($routeName) }}" class="btn btn-primary">Voir plus</a>
                          @else
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                              Voir plus
                          </button>
                           @endauth    
                     @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>Aucun contenu disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection
