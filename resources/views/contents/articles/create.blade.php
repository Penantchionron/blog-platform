@extends('layouts.dashboard')

@section('title', 'Accueil')

@section('content')

<div class="container">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Créer un {{ ucfirst($type) }}</h3>
        </div>
        <form action="{{ route($type . '.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" name="title" class="form-control" placeholder="Titre">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                @if ($type === 'article')
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="images[]" multiple class="form-control">
                    </div>
                @else
                    <div class="form-group">
                        <label>Fichier ({{ $type }})</label>
                        <input type="file" name="media" class="form-control">
                    </div>
                @endif

                <div class="form-group">
                    <label>Prix</label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label>Statut</label>
                    <select name="status" class="form-control">
                        <option value="draft">Brouillon</option>
                        <option value="published">Publié</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_free">
                        Gratuit ?
                    </label>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

@endsection