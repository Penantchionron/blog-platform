@extends('layouts.dashboard')

@section('title', 'Créer un ' . ucfirst($type))

@section('content')

<div class="container">
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-outline card-primary mt-4">
        <div class="card-header">
            <h3 class="card-title">Créer un {{ ucfirst($type) }}</h3>
        </div>
        <form action="{{ route($type . '.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                
                <div class="form-group mb-3">
                    <label>Titre</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Titre" required>
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                @if ($type === 'article')
                    <div class="form-group mb-3">
                        <label>Images</label>
                        <input type="file" name="images[]" multiple class="form-control">
                        @error('images.*') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                @else
                    <div class="form-group mb-3">
                        <label>Fichier {{ strtoupper($type) }}</label>
                        <input type="file" name="media" class="form-control" required>
                        @error('media') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                @endif

                <div class="form-group mb-3">
                    <label>Prix (€)</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', 0) }}" step="0.01" min="0">
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Statut</label>
                    <select name="status" class="form-control" required>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publié</option>
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="is_free" class="form-check-input" id="isFree" {{ old('is_free') ? 'checked' : '' }}>
                    <label for="isFree" class="form-check-label">Gratuit ?</label>
                </div>
            </div>

            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

@endsection
