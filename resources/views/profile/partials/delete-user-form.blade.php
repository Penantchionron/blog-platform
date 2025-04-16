<section>
    <h2 class="h5 text-danger mb-3">Supprimer le compte</h2>
    <p class="text-muted small mb-3">
        Une fois votre compte supprimé, toutes vos données seront définitivement effacées. 
    </p>

    <!-- Bouton pour ouvrir le modal -->
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        Supprimer mon compte
    </button>

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deleteAccountModalLabel">Confirmer la suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez-vous vraiment supprimer votre compte ? Cette action est irréversible.</p>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer définitivement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</section>
