@extends('layouts.master')

@section('title', 'Inviter des contacts')

@section('css_header')
@endsection

@section('content')
<main class="main mainheight">
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Test personnalité") }}</h5>
            </div>
            
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                </figure>
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
                <li class="breadcrumb-item active" aria-current="page"><span >{{ __("generated.Inviter des contacts") }}</span></li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">

        <form action="{{ route('api.personalityTest.campaign.add_to_campaign') }}" method="post">
            @csrf

            {{-- input hidden campaign_id from url params --}}
            <input type="hidden" name="campaign_id" value="{{ request()->query('campaign_id') }}">

            <div class="row mb-4 justify-content-center">
                <div class="col-12">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <h6 class="title custom-title mb-4"><span >{{ __("generated.Ajouter des collaboreurs dans la campagne :") }}</span>  <b> {{ __($campaign->label) }} </b> </h6>
                                                    <div class="form-group position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <label for="collaborators" class="hidlab ">{{ __("generated.Select collaboreurs:") }}</label>
                                                                <select class="form-control select2-elem" name="collaborators[]" id="collaborators" multiple="multiple" style="width: 100%">
                                                                    @foreach ($assessfirstUsers['data'] as $collab)

                                                                        <option value="{{ __($collab['uuid']) }}"> {{ __($collab['email']) }} </option>
                                                                        
                                                                    @endforeach
                                                                </select>
                                                                  
                                                                @error('collaborators')
                                                                    <div class="error-message">{{ __($message) }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="col-12 ms-auto" style="width: 36%">
                                                    <div class="form-check form-switch" style="margin-top: 4px;">
                                                        <button  type="submit" class="btn btn-theme mnw-100 bg-blue " style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Envoyer") }}</button>
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
            
        </form>
    </div>

</main>
@endsection


@section('js_footer')

@endsection