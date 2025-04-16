<!-- Formulaire de mise à jour du profil -->
<section>
    <h2 class="h5 text-dark mb-3">Modifier mes informations</h2>

    {{-- Vérification email --}}
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="last_name" class="form-label">Prénom</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('first_name', Auth::user()->first_name) }}"
                   class="form-control">
            @error('last_name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}"
                   class="form-control">
            @error('last_name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                   class="form-control">
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                <div class="alert alert-warning mt-2 p-2 small">
                    Votre adresse email n'est pas vérifiée.
                    <button type="submit" form="send-verification" class="btn btn-link p-0 align-baseline">
                        Renvoyer le lien de vérification
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2 p-2 small">
                        Un nouveau lien de vérification vous a été envoyé !
                    </div>
                @endif
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button class="btn btn-primary" type="submit">Enregistrer</button>

            @if (session('status') === 'profile-updated')
                <small class="text-success ms-3">Modifications enregistrées.</small>
            @endif
        </div>
    </form>
</section>
