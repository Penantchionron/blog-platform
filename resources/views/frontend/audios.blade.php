@extends('layouts.vuePrincipal')
@section('title', 'Vidéos')

@section('content')
<main class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Audios</h2>
        <div class="row">
            @forelse ($contents as $content)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">{{ Str::limit($content->description, 100) }}</p>

                            <audio
                                src="{{ route('content.stream', $content->id) }}" 
                                controls 
                                controlsList="nodownload" 
                                class="w-100 rounded shadow my-3"
                                oncontextmenu="return false;">
                            </audio>

                            <a href="{{ route('paypal.checkout', $content->id) }}" 
                               class="btn btn-primary btn-sm w-100 mt-2">
                                💾 Télécharger <b>{{$content->price }} €</b>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Aucun contenu vidéo pour le moment.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection
