<form method="POST" action="{{ route('profile.full-update') }}">
    @csrf
    @method('PATCH')

    {{-- Infos utilisateur --}}
    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', Auth::user()->first_name) }}">
        @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', Auth::user()->last_name) }}">
        @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <div class="mb-3">
        <label>Pays</label>
        <input type="text" name="country" class="form-control" value="{{ old('country', Auth::user()->country) }}">
        @error('country') <small class="text-danger">{{ $message }}</small> @enderror
    </div>


    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Mot de passe --}}
    <div class="mb-3">
        <label>Mot de passe actuel</label>
        <input type="password" name="current_password" class="form-control" required>
        @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Nouveau mot de passe</label>
        <input type="password" name="password" class="form-control" required>
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    {{-- Bouton final --}}
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Tout enregistrer</button>
    </div>
</form>

