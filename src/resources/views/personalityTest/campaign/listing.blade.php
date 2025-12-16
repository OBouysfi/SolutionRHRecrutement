@extends('layouts.master')

@section('title', 'Test Presonnalité')

@section('css_header')
@endsection

@section('content')

    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Test personnalité") }}</h5>
                </div>
                
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                     title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
                            <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #26b6ea;">
                                <span class="input-group-text text-secondary bg-none" style="border: 0;">
                                    <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                                </span>
                            </figure>
                        </div>
                    </a>
                 </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox" style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{asset('assets/img/icon/hj_icon.svg')}}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{asset('assets/img/icon/faciliti.png')}}" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Campagnes") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6" style="padding-left: 22px">
                                                    <h5 >{{ __("generated.Campagnes") }}</h5>
                                                </div>

                                                
                                                <div class="col-auto ms-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Create Campaign") }}" style="margin-top: 5px;">
                                                    
                                                    <button class="btn btn-theme " type="button"
                                                        data-bs-toggle="modal" data-bs-target="#createCampaign">{{ __("generated.Créer une Campagne") }}</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table " data-show-toggle="true">
                                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr style="vertical-align: middle;">

                                                            <th >{{ __("generated.label") }}</th>
                                                            <th  >{{ __("generated.Ville") }}</th>
                                                            {{-- <th >Nombre d'invité</th> --}}
                                                            <th  >{{ __("generated.Actions") }}</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px">

                                                            @foreach($campaigns as $campaign)
                                                            
                                                                <tr style="vertical-align: middle;">
                                                                    <td style="vertical-align: middle;">
                                                                        {{ __($campaign['label']) }}
                                                                    </td>
                                                                    <td style="vertical-align: middle;">
                                                                        {{ __($campaign['city']['name']) }}
                                                                    </td>
                                                                    {{-- <td style="vertical-align: middle;">
                                                                        {{ __($campaign['user_count']) }}
                                                                    </td> --}}
                                                                    <td style="vertical-align: middle">
                                                                        
                                                                        <button class="btn btn-theme toggle-invit-modal-btn" type="button" data-assessfirst-campaign-id="{{ __($campaign['assessfirst_id']) }}" data-campaign-label="{{ __($campaign['label']) }}"
                                                                            data-bs-toggle="modal" data-bs-target="#addToCampaign">
                                                                            <i class="bi bi-person-fill-add fs-6 " ></i> <span >{{ __("generated.Inviter") }}</span> 
                                                                        </button>

                                                                        <button class="btn btn-theme toggle-edit-modal-btn" type="button" data-assessfirst-campaign-id="{{ __($campaign['assessfirst_id']) }}" data-campaign-label="{{ __($campaign['label']) }}" data-predictive-model-id="{{ __($campaign['predictive_model_id']) }}" data-location="{{ __($campaign['location']) }}"
                                                                            data-bs-toggle="modal" data-bs-target="#editCampaign">
                                                                            <i class="bi bi-person-fill-edit"></i> <span >{{ __("generated.Modifier") }}</span> 
                                                                        </button>

                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('personalityTest.campaign.inc.createCampaignModal')
        @include('personalityTest.campaign.inc.editCampaignModal')
        @include('personalityTest.campaign.inc.inviteToCampaignModal')
    </main>

@endsection


@section('js_footer')

    
<script>
    var ApiCreateCampaign = "{{ route('api.personalityTest.campaign.create') }}";
    var ApiUpdateCampaign = "{{ route('api.personalityTest.campaign.update') }}";
    var ApiAddToCampaign = "{{ route('api.personalityTest.campaign.add_to_campaign') }}";


    let invite_campaign_id = null;
    let edit_campaign_id = null;
    

    $(document).ready(function() {
        
        // on click of button save-btn
        $(document).on('click', '.save-btn', function() {
            
            // hide save-btn and show loading-btn
            $(this).hide();
            $('.loading-btn').show();

            var label = $('#label').val();
            var predictive_model_id = $('#predictive_model_id').val();
            var campaign_location = $('#location').val();

            $.ajax({
                url: ApiCreateCampaign,
                type: 'POST',
                data: {
                    'label': label,
                    'predictive_model_id': predictive_model_id,
                    'location': campaign_location
                },
                success: function(response) {
                    console.log(response);

                    // close modal createCampaign
                    $('#createCampaign').modal('hide');

                    Swal.fire({
                        icon: 'success',
                        title: 'Campagne créee',
                        text: response.message,
                        // with confirm button that will reload the page
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });



                    // show save-btn and hide loading-btn
                    $('.save-btn').show();
                    $('.loading-btn').hide();
                },
                error: function(error) {
                    
                    Swal.fire({
                        icon: 'warning',
                        title: 'erreur de sauvegarde',
                        text: error.message,
                    });

                    console.log(error);
                    // show save-btn and hide loading-btn
                    $('.save-btn').show();
                    $('.loading-btn').hide();
                }
                
            });
        })

        // on click of button update-btn
        $(document).on('click', '.update-btn', function() {
            
            // hide update-btn and show loading-btn
            $(this).hide();
            $('.loading-btn').show();

            var label = $('#edit_label').val();
            var predictive_model_id = $('#edit_predictive_model_id').val();
            var campaign_location = $('#edit_location').val();

            $.ajax({
                url: ApiUpdateCampaign,
                type: 'POST',
                data: {
                    'assessfirst_id': edit_campaign_id,
                    'label': label,
                    'predictive_model_id': predictive_model_id,
                    'location': campaign_location
                },
                success: function(response) {
                    console.log(response);

                    // close modal createCampaign
                    $('#createCampaign').modal('hide');

                    Swal.fire({
                        icon: 'success',
                        title: 'Campagne modifiée',
                        text: response.message,
                        // with confirm button that will reload the page
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });



                    // show update-btn and hide loading-btn
                    $('.update-btn').show();
                    $('.loading-btn').hide();
                },
                error: function(error) {
                    
                    Swal.fire({
                        icon: 'warning',
                        title: 'erreur de sauvegarde',
                        text: error.message,
                    });

                    console.log(error);
                    // show update-btn and hide loading-btn
                    $('.update-btn').show();
                    $('.loading-btn').hide();
                }
                
            });
        })




        // on click of button invite-btn
        $(document).on('click', '.invit-btn', function() {
            
            // hide invit-btn and show loading-btn
            $(this).hide();
            $('.loading-btn').show();

            // get select2 values with id 'collaborators'
            let collaborators = $('#collaborators').val();

            $.ajax({
                url: ApiAddToCampaign,
                type: 'POST',
                data: {
                    'collaborators': collaborators,
                    'campaign_id': invite_campaign_id
                },
                success: function(response) {
                    console.log(response);

                    // close modal createCampaign
                    $('#createCampaign').modal('hide');

                    Swal.fire({
                        icon: 'success',
                        title: 'Invitations envoyées',
                        text: response.message,
                        // with confirm button that will reload the page
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        location.reload();
                    });

                    // show invit-btn and hide loading-btn
                    $('.invit-btn').show();
                    $('.loading-btn').hide();
                },
                error: function(error) {
                    
                    Swal.fire({
                        icon: 'warning',
                        title: 'erreur lors de l\'invitation',
                        text: error.message,
                    });

                    console.log(error);
                    // show invit-btn and hide loading-btn
                    $('.invit-btn').show();
                    $('.loading-btn').hide();
                }
                
            });
        })

        // on click of button toggle-invit-modal-btn
        $(document).on('click', '.toggle-invit-modal-btn', function() {
            invite_campaign_id = $(this).data('assessfirst-campaign-id');
            let label = $(this).data('campaign-label');

            $('.campaignLabel').text(label);
        });

        // on click of button toggle-edit-modal-btn
        $(document).on('click', '.toggle-edit-modal-btn', function() {
            edit_campaign_id = $(this).data('assessfirst-campaign-id');
            let label = $(this).data('campaign-label');
            let predictive_model_id = $(this).data('predictive-model-id');
            let campaign_location = $(this).data('location');

            $('#edit_label').val(label);
            $('#edit_predictive_model_id').val(predictive_model_id).trigger('change');
            $('#edit_location').val(campaign_location).trigger('change');

            $('.campaignLabel').text(label);
        });


    });
</script>


@endsection
