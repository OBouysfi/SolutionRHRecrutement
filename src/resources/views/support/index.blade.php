@extends('layouts.master')

@section('title', __('generated.Support'))

@section('css_header')

@endsection

@section('content')
    <!-- Begin page content -->
    <main class="main mainheight">
        <div class="container-fluid mb-4 title-bg">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Nous contacter") }}</h5>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" >{{ __("generated.HumanJobs") }}</a></li>
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Nous contacter") }}</li>
                </ol>
            </nav>
        </div>

        <div class="container">
            <div class="text-center">
                <h2><span >{{ __("generated.Nous sommes") }}</span> <span class="text-gradient"><span
                            >{{ __("generated.Heureux de vous aider") }}</span></span>
                </h2>
                <p class="text-secondary mb-4 ">{{ __("generated.Contactez-nous maintenamt, nous vous répondrons dés que possible") }}</p>
            </div>
            <form id="supportForm" action="{{ route('support.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center mb-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text text-theme border-end-0"><i
                                                class="bi bi-person"></i></span>
                                        <div class="form-floating">
                                            <input type="text" name="first_name" placeholder="{{ __("generated.prenom") }}"
                                                class="form-control border-start-0 translated_text" required>
                                            <label >{{ __("generated.Prenom") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text text-theme border-end-0"><i
                                                class="bi bi-person"></i></span>
                                        <div class="form-floating">
                                            <input type="text" name="last_name" placeholder="{{ __("generated.Nom de famille") }}"
                                                class="form-control border-start-0 translated_text" required>
                                            <label >{{ __("generated.Nom de famille") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text text-theme border-end-0"><i
                                                class="bi bi-envelope"></i></span>
                                        <div class="form-floating">
                                            <input type="email" placeholder="{{ __("generated.Adresse e-mail") }}" required
                                                class="form-control border-start-0 translated_text" name="email">
                                            <label >{{ __("generated.Adresse e-mail") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text text-theme border-end-0"><i
                                                class="bi bi-envelope"></i></span>
                                        <div class="form-floating">
                                            <input type="text" name="subject" placeholder="{{ __("generated.Sujet") }}"
                                                class="form-control border-start-0 translated_text" required>
                                            <label >{{ __("generated.Sujet") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group mb-3 position-relative check-valid">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text text-theme border-end-0"><i
                                                class="bi bi-chat-right-text"></i></span>
                                        <div class="form-floating">
                                            <textarea placeholder="Message" class="form-control border-start-0 h-auto" rows="4" name="message"></textarea>
                                            <label >{{ __("generated.Message") }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-theme ">{{ __("generated.Envoyer le message") }}</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- email communication -->
            <div class="row justify-content-center my-4">
                <div class="col-12 col-md-6 col-xl-4 text-md-end p-4">
                    <h5 >{{ __("generated.Problème technique") }}</h5>
                    <p class="text-mute"><span class="translated_text">{{ __("generated.Si vous rencontrez des probèmes techniques et") }} <br>
                            {{ __("generated.souhaitez obtenir de l'aide de notre part, veuillez") }} <br>
                            {{ __("generated.envoyer un e-mail à") }}
                        </span>
                        <a href="mailto:sales@humanjobs.ma">sales@humanjobs.ma</a>
                    </p>
                </div>
                <div class="col-12 col-md-6 col-xl-4 p-4 border-left-dashed">
                    <h5 >{{ __("generated.Support Général") }}</h5>
                    <p class="text-mute"><span class="translated_text">{{ __("generated.Si vous rencontrez des probèmes concernant les") }} <br>
                            {{ __("generated.produits et souhaitez obtenir de l'aide de notre part") }}, <br>
                            {{ __("generated.veuillez envoyer un e-mail à") }} </span>
                        <a href="support@humanjobs.ma">
                            support@humanjobs.ma</a>
                    </p>
                </div>
            </div>
       
    </main>
@endsection


@section('js_footer')
    <script>
        var actionUrl = "{{ route('support.store') }}";
    </script>

    <script>
        $(document).ready(function() {
            $('#supportForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log("Success:", data);

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "{{__('generated.e-mail a été envoyé avec succès !')}}",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#supportForm')[0].reset();
                    },
                    error: function(xhr) {
                        var errorMsg = "{{ __('generated.Une erreur s\'est produite, veuillez réessayer.') }}";

                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.message) {
                                errorMsg = xhr.responseJSON.message;
                            }

                            if (xhr.responseJSON.errors) {
                                errorMsg = "<ul>";
                                $.each(xhr.responseJSON.errors, function(key, value) {
                                    errorMsg += "<li>" + value + "</li>";
                                });
                                errorMsg += "</ul>";
                            }
                        }

                        Swal.fire({
                            icon: "error",
                            title: "{{ __('generated.Erreur') }}",
                            html: errorMsg,
                        });

                        console.error("Error:", xhr.responseJSON);
                    }
                });
            });
        });
    </script>


@endsection
