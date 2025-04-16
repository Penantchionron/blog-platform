@extends('layouts.dashboard')

@section('title', 'Accueil')

@section('content')
<h1> Bienvenue</h1>

<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Liste des {{ ucfirst($type) }}</h3>
            <a href="{{ route($type . '.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Ajouter un {{ $type }}
            </a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Statut</th>
                        <th>Prix</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $content)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $content->title }}</td>
                            <td>{{ $content->user->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge badge-{{ $content->status === 'published' ? 'success' : 'secondary' }}">
                                    {{ $content->status }}
                                </span>
                            </td>
                            <td>
                                {{ $content->is_free ? 'Gratuit' : number_format($content->price, 2) . ' FCFA' }}
                            </td>
                            <td>{{ $content->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route($type . '.edit', $content) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route($type . '.destroy', $content) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucun {{ $type }} disponible.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>


@endsection