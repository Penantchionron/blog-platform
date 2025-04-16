<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white btn btn-primary btn-sm">
                <h5 class="modal-title" id="profileModalLabel">Mon Profil</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu du profil -->
                <div class="space-y-6">
                    <div class="p-4 bg-light shadow-sm rounded">
                        @include('profile.full-update')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
