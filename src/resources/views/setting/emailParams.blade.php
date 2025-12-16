@extends('layouts.master')

@section('title', __('generated.Emails'))

@section('css_header')
    <style>
        .title.custom-title {
            border-bottom: 0 !important;
            padding-bottom: 0px !important;
        }
    </style>
@endsection
@section('content')
    <main class="main mainheight" >
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Paramètre") }}</h5>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
                            <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #005DC7;">
                                <span class="input-group-text text-secondary bg-none" style="border: 0;">
                                    <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                                </span>
                            </figure>
                        </div>
                    </a>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{ asset('assets/img/icon/faciliti.png') }}"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Emails") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            {{-- <div class="row mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class=" title custom-title">{{ __("generated.Templates Email") }}</h4>
                    <button type="button" class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#addTemplateModal">
                        <i class="bi bi-plus-circle"></i><span >{{ __("generated.Ajouter un nouveau template") }}</span>
                    </button>
                </div>
            </div> --}}

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('generated.Fermer') }}"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('generated.Fermer') }}"></button>
                </div>
            @endif
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __("generated.Succès") }}',
                        text: '{{ session('success') }}',
                        timer: 2500,
                        showConfirmButton: false
                    });
                </script>
            @endif

            <div class="row mb-4">
                @foreach ($emailTemplates as $template)
                    <div class="col-4">
                        <div class="card border-0 mb-4">
                            <div class="card-body p-0">
                                <div class="card border-0">
                                    <div class="card-header">
                                        <div class="row ">
                                            <div class="col-auto">
                                                <h6 class="title custom-title translated_text">{{ __($template->name) }}</h6>
                                            </div>
                                            <div class="col-auto ms-auto">
                                                <div class="form-check form-switch" style="margin-top: 7px">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        data-template-id="{{ $template->id }}"
                                                        {{ $template->is_active ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex align-items-center">
                                                <div class="dropdown">
                                                    <a class="text-dark" data-bs-toggle="dropdown" aria-expanded="false"
                                                        href="#">
                                                        <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <button type="button" class="dropdown-item"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editTemplateModal{{ $template->id }}">
                                                                <i class="bi bi-pencil me-1"></i> <span
                                                                    >{{ __("generated.Modifier") }}</span>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <form method="POST"
                                                                action="{{ route('emailTemplates.destroy', $template->id) }}"
                                                                class="delete-template-form"
                                                                data-id="{{ $template->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="dropdown-item text-danger delete-template-btn">
                                                                    <i class="bi bi-trash me-1"></i><span
                                                                        >{{ __("generated.Supprimer") }}</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <input type="text" value="{{ __($template->subject) }}"
                                                                required="" class="form-control border-start-0">
                                                            <label>{{ __("generated.Objet") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label style="width: 100%;margin-top: 10px;margin-bottom: 5px;"
                                                    >{{ __("generated.Message :") }}</label>
                                                <textarea style="width: 100%;height: 295px;padding: 10px;text-align: justify;">{{ __($template->content) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model Edit Template Email -->
                    <div class="modal fade" id="editTemplateModal{{ $template->id }}" tabindex="-1"
                        aria-labelledby="editTemplateModalLabel{{ $template->id }}" aria-hidden="true"
                        style="margin: 85px">
                        <div class="modal-dialog modal-lg">
                            <form action="{{ route('emailTemplates.update', $template->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title "
                                            id="editTemplateModalLabel{{ $template->id }}">{{ __("generated.Modifier le Model") }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="{{ __('generated.Fermer') }}"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label ">{{ __("generated.Nom du template") }}</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ __($template->name) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">{{ __("generated.Objet") }}</label>
                                            <input type="text" class="form-control" name="subject"
                                                value="{{ __($template->subject) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label ">{{ __("generated.Message") }}</label>
                                            <textarea class="form-control" name="content" rows="10" required>{{ __($template->content) }}</textarea>
                                        </div>
                                        <!-- Statut -->
                                        <div class="mb-3">
                                            <label class="form-label ">{{ __("generated.Statut") }}</label>
                                            <div class="form-check form-switch" style="margin-top: 7px">
                                                <input class="form-check-input" type="checkbox" name="is_active"
                                                    value="1" checked>
                                                <label class="form-check-label ">{{ __("generated.Actif") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-theme ">{{ __("generated.Enregistrer") }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Model Ajout Template Email -->
    <div class="modal fade" id="addTemplateModal" tabindex="-1" aria-labelledby="addTemplateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('emailTemplates.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="addTemplateModalLabel">{{ __("generated.Ajouter un nouveau template") }}</h5>
                        <button type="button" class="btn-close translated_text" data-bs-dismiss="modal"
                            aria-label="{{ __('generated.Fermer') }}"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="{{ __('generated.Poste') }}" id="templateName" name="name"
                                        class="form-control border-start-0">
                                    <label>{{ __("generated.Nom du template") }}</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="{{ __('generated.Poste') }}" id="templateSubject" name="subject"
                                        class="form-control border-start-0">
                                    <label>{{ __("generated.Objet") }}</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="templateContent" class="form-label ">{{ __("generated.Message") }}</label>
                            <textarea style="width: 100%;height: 295px;padding: 10px;text-align: justify;" id="templateContent" name="content"></textarea>
                        </div>
                        <!-- Statut -->
                        <div class="mb-3">
                            <label class="form-label ">{{ __("generated.Statut") }}</label>
                            <div class="form-check form-switch" style="margin-top: 7px">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                                <label class="form-check-label ">{{ __("generated.Actif") }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button " class="btn btn-secondary " data-bs-dismiss="modal">{{ __("generated.Annuler") }}</button> --}}
                        <button type="submit" class="btn btn-theme ">{{ __("generated.Enregistrer") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js_footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Après la boucle dans votre fichier Blade -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.form-check-input');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function(event) {
                    const templateId = this.dataset.templateId;
                    const isActive = this.checked;

                    // Message personnalisé en fonction de l'action
                    const action = isActive ? '{{ __("generated.activer") }}' : '{{ __("generated.désactiver") }}';
                    const actionMessage = isActive ? '{{ __("generated.Voulez-vous vraiment activer ce modèle ?") }}' :
                        '{{ __("generated.Voulez-vous vraiment désactiver ce modèle ?") }}';

                    // SweetAlert
                    Swal.fire({
                        title: '{{ __("generated.Êtes-vous sûr ?") }}',
                        text: actionMessage,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: `{{ __("generated.Oui") }}, ${action}`,
                        cancelButtonText: '{{ __("generated.Annuler") }}'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Envoyer la requête AJAX
                            fetch(`/email-templates/${templateId}/toggle`, {
                                    method: 'PATCH',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        is_active: isActive
                                    })
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Erreur réseau');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            '{{ __("generated.Succès") }}',
                                            `{{ __("generated.Le modèle a été") }} ${action} {{ __("generated.avec succès.") }}`,
                                            'success'
                                        );
                                    } else {
                                        Swal.fire(
                                            '{{ __("generated.Erreur") }}',
                                            '{{ __("generated.Une erreur s\'est produite.") }}',
                                            'error'
                                        );
                                        this.checked = !isActive;
                                    }
                                })
                                .catch(error => {
                                    console.error('Erreur:', error);
                                    Swal.fire(
                                        '{{ __("generated.Erreur") }}',
                                        '{{ __("generated.Une erreur s\'est produite lors de la mise à jour.") }}',
                                        'error'
                                    );
                                    this.checked = !isActive;
                                });
                        } else {
                            this.checked = !isActive;
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-template-btn').on('click', function() {
                let form = $(this).closest('.delete-template-form');
                let templateId = form.data('id');

                Swal.fire({
                    title: '{{ __("generated.Supprimer ce template ?") }}',
                    text: "{{ __('generated.Cette action est irréversible !') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: '{{ __("generated.Oui, supprimer") }}',
                    cancelButtonText: '{{ __("generated.Annuler") }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
