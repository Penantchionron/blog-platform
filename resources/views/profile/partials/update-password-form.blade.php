<section>
    <h2 class="h5 text-dark mb-3">Modifier mon mot de passe</h2>
    <p class="text-muted mb-4 small">
        Assurez-vous d'utiliser un mot de passe long et aléatoire pour plus de sécurité.
    </p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Mot de passe actuel</label>
            <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="current-password" required>
            @error('current_password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
            @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password" required>
            @error('password_confirmation')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Enregistrer</button>

            @if (session('status') === 'password-updated')
                <small class="text-success ms-3">Mot de passe mis à jour !</small>
            @endif
        </div>
    </form>
</section>
