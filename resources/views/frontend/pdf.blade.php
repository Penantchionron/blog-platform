@extends('layouts.vuePrincipal')
@section('title', 'Vidéos')

@section('content')
<main class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center">📄 PDF</h2>
        <div class="row">
            @forelse ($contents as $content)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">{{ Str::limit($content->description, 100) }}</p>

                            @if($content->getFirstMedia('media'))
                                <iframe 
                                    src="{{ $content->getFirstMedia('media')->getUrl() }}#toolbar=1"
                                    width="100%" height="600px"
                                    style="border: 1px solid #ccc;"></iframe>
                            @elseif($content->path)
                                <iframe 
                                    src="{{ route('content.stream', $content->id) }}#toolbar=1"
                                    width="100%" height="600px"
                                    style="border: 1px solid #ccc;"></iframe>
                            @else
                                <div class="alert alert-warning mt-2">Le PDF n'est pas disponible.</div>
                            @endif

                            <a href="{{ route('paypal.checkout', $content->id) }}" 
                               class="btn btn-success btn-sm w-100 mt-3">
                               💾 Télécharger <b>{{$content->price }} €</b>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Aucun contenu PDF pour le moment.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection
