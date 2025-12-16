<!-- Modal Partager -->
<div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h6 class="mb-4 text-center"><span >{{ __("generated.Envoyez un lien de cette page par email.") }}</span></h6>
                <!-- Formulaire pour envoyer l'email -->
                <form action="{{ route('send.vt.email') }}" method="POST">
                    @csrf
                    <input type="hidden" name="page_url" value="{{ url()->current() }}">
                    <input type="hidden" name="message" value="Voici le lien de la page que vous m'avez demandé :">

                    <div class="mb-3">
                        <label class="form-label text-secondary"><span >{{ __("generated.À :") }}</span></label>
                        <input type="text" name="to" class="form-control"
                            placeholder="{{ __("generated.Entrez les adresses email") }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary"><span >{{ __("generated.CC :") }}</span></label>
                        <input type="text" name="cc" class="form-control"
                            placeholder="{{ __("generated.Entrez les adresses en CC") }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary"><span >{{ __("generated.Objet :") }}</span></label>
                        <input type="text" name="subject" class="form-control"
                            placeholder="{{ __("generated.Entrez le sujet de l'email") }}" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="bi bi-trash h4 me-2"></i> <span >{{ __("generated.Annuler") }}</span>
                        </button>
                        <button class="btn btn-theme" type="submit">
                            <i class="bi bi-send me-2"></i><span >{{ __("generated.Envoyer") }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>