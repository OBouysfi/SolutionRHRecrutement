<style>
    .email-compose-modal {
        max-width: 700px;
        margin: 1.75rem auto;
    }

    .input-box {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .input-label {
        position: absolute;
        top: -0.75rem;
        left: 1rem;
        padding: 0 0.5rem;
        background: white;
        color: #6c757d;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }

    .input-1 {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid #dee2e6;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .input-1:focus {
        outline: none;
        border-color: #0d6efd;
    }

    .input-1:focus + .input-label {
        color: #0d6efd;
    }

    .ck.ck-editor {
        margin-bottom: 1.5rem;
    }

    .ck.ck-editor__main > .ck-editor__editable {
        min-height: 250px;
        max-height: 400px;
        border-radius: 0 0 0.5rem 0.5rem !important;
    }

    .ck.ck-toolbar {
        border-radius: 0.5rem 0.5rem 0 0 !important;
    }


    @media (max-width: 576px) {
        .email-compose-modal {
            margin: 1rem;
        }

        .modal-body {
            padding: 1rem;
        }
    }
</style>
<div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered email-compose-modal">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px" class="bi bi-envelope avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Envoyez un e-mail") }}</h6>
                    </div>
                </div>

                <!-- Formulaire pour envoyer l'email -->
                <form action="{{ route('send.email') }}" method="POST">
                    @csrf
                    <input type="hidden" name="page_url" value="{{ url()->current() }}">
                    <input type="hidden" name="message" value="Voici le lien de la page que vous m'avez demandé :">

                    <div class="input-box">
                        <label class="label " for="recipients">{{ __("generated.Destinataires") }}</label>
                        <input type="email" class="form-control border-start-0" name="to"  id="recipients" required>
                    </div>

                    <div class="input-box">
                        <label class="label " for="cc">{{ __("generated.CC") }}</label>
                        <input type="email" class="form-control border-start-0" name="cc"  id="cc">
                    </div>

                    <div class="input-box">
                        <label class="label " for="subject">{{ __("generated.Objet") }}</label>
                        <input type="text" class="form-control border-start-0" name="subject" id="subject" required>
                    </div>

                    <div class="input-box">
                        <label class="label " for="message">{{ __("generated.Message") }}</label>
                        <textarea class="form-control border-start-0" name="message" id="message" rows="5" required></textarea>
                        <!-- <textarea class="form-control border-start-0" name="message" id="message" rows="5" required>Voici le lien de la page que vous m'avez demandé : {{ url()->current() }}</textarea> -->
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-4">
                        <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-trash h4 me-2"></i><span >{{ __("generated.Supprimer") }}</span> </button>
                        <button type="submit" class="btn btn-theme">
                            <i class="bi bi-send me-2"></i>
                           <span >{{ __("generated.Envoyer") }}</span> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
