{{-- resources/views/frontend/contents/show.blade.php --}}
@extends('layouts.vuePrincipal')

@section('title', $content->title)

@section('content')
<main class="py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">

                <h2 class="mb-3">{{ $content->title }}</h2>
                <span class="badge bg-secondary mb-3 text-uppercase">{{ $content->type }}</span>

                <p class="text-muted">{{ $content->description }}</p>

                <div class="content-wrapper my-4">
                    @if ($content->type === 'videos' || $content->type === 'audios')
                        <{{ $content->type === 'videos' ? 'video' : 'audio' }}
                            src="{{ route('content.stream', $content->id) }}"
                            controls class="w-100 rounded shadow mt-3">
                        </{{ $content->type === 'videos' ? 'video' : 'audio' }}>
                    
                    @elseif ($content->type === 'pdf')
                        @if($content->getFirstMedia('media'))
                            <iframe src="{{ $content->getFirstMedia('media')->getUrl() }}#toolbar=1"
                                width="100%" height="600px"
                                style="border: 1px solid #ccc;"></iframe>
                        @elseif($content->path)
                            <iframe src="{{ asset($content->path) }}#toolbar=1"
                                width="100%" height="600px"
                                style="border: 1px solid #ccc;"></iframe>
                        @else
                            <div class="alert alert-warning">Le PDF n'est pas disponible.</div>
                        @endif

                    @elseif ($content->type === 'articles')
                        <div class="article-content">
                            {!! $content->body !!}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
