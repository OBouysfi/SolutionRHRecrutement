<div class="row justify-content-center">
    <div class="col-12 mb-3">
        <div class="card border-0 p-0">
            <div class="card-header bg-gradient-theme-light">
                <div class="row align-items-center">
                    <h6 class="fw-medium mb-0 ">{{ __("generated.Diplômes") }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 p-0">
                            <div class="card-body">
                                {{-- <div class="container">
                                    <h4 class="title custom-title  mt-4 ">{{ __("generated.Diplômes") }}</h4>
                                </div> --}}
                                <div id="formations-container">
                                    @if (isset($formations) && count($formations) > 0)
                                        @foreach ($formations as $formation)
                                            <div>
                                                {{-- <div
                                                    class="bg-light-theme card mb-4 shadow-lg border-0 rounded-lg block-view formation-view"
                                                    id="view-formations-{{ __($formation?->id) }}">
                                                    <div class="card-body p-4">
                                                        <div class="row align-items-center justify-content-between">
                                                            @if (isset($formation?->logo))
                                                            <div class="col-md-2 text-center">
                                                                <img src="{{ $formation?->getLogoUrl() ?? asset('assets/img/default-logo.png') }}"
                                                                    alt="Logo" class="img-fluid rounded-circle shadow-sm"
                                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                                            </div>
                                                            @endif
                                                            <div class="col-md-6">
                                                                <h5 class="text-info mb-3">
                                                                    {{ __($formation?->diploma?->label) }} -
                                                                    {{ $formation?->option?->label ?? '' }}</h5>
                                                                <p class="mb-2">
                                                                    <i class="bi bi-buildings-fill text-warning"></i>
                                                                    <strong>{{ __("generated.Université :") }}</strong>
                                                                    {{ $formation?->name ?? 'Non disponible' }}
                                                                </p>
                                                                <p class="mb-2">
                                                                    <i class="bi bi-info-square text-info"></i>
                                                                    <strong>{{ __("generated.Niveau :") }}</strong>
                                                                    {{ $formation?->level?->label ?? 'Non disponible' }}
                                                                </p>
                                                                <p class="mb-2">
                                                                    <i class="bi bi-calendar text-primary"></i>
                                                                    <strong>{{ __("generated.Date :") }}</strong>
                                                                    {{ \Carbon\Carbon::parse($formation?->date)->format('Y-m-d')
                                                                    ?? 'Non disponible' }}

                                                                </p>
                                                            </div>

                                                            <div class="col-md-4 text-end">
                                                                <button
                                                                    class="btn btn-outline-danger squered-pill px-3 delete-btn translated_text"
                                                                    data-form-name="formations"
                                                                    data-id="{{ __($formation?->id) }}"
                                                                    aria-label="Supprimer cette formation">
                                                                    <i class="bi bi-trash3"></i>
                                                                </button>

                                                                <button
                                                                    class="btn btn-outline-info squered-pill px-3 aria-label"
                                                                    data-formation-id="{{ __($formation?->id) }}"
                                                                    onclick="toggleFormationForm('formations', this.dataset.formationId, true)">
                                                                    <i class="bi bi-pen"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div id="form-formations-{{ __($formation?->id) }}" class="edit-subform">
                                                    <form id="profile-formation-{{ __($formation?->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="id" value="{{ $formation?->id ?? '' }}" hidden
                                                            readonly>
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="row justify-content-center mt-5">
                                                                        <div class="col-12 mb-3" style="width: 150px;">
                                                                            <div class="col-auto position-relative">
                                                                                <figure
                                                                                    class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                    style="background-image: url(&quot;{{ __($formation?->logo) }}&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                                                    <img src="{{ $formation?->getLogoUrl() }}"
                                                                                        alt="" style="display: none;">
                                                                                </figure>
                                                                                <div
                                                                                    class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                                                    <label
                                                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                                                        <i class="bi bi-camera"></i>
                                                                                        <input type="file" name="logo"
                                                                                            class="custom-file-input formation-logo"
                                                                                            id="formation-logo"
                                                                                            accept="image/*" />
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-10">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-6 custom-mrg">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="{{ __("generated.Institution") }}"
                                                                                                required name="name"
                                                                                                value="{{ __($formation?->name) }}"
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.Institution") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('name')
                                                                                        <div
                                                                                            class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="col-6 col-md-3 mb-2">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label>{{ __("generated.Pays") }}</label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            id="country-select"
                                                                                            name="country_id">
                                                                                            <option value="">
                                                                                                {{ __("generated.Choisir un pays") }}
                                                                                            </option>
                                                                                            @if (isset($countries))
                                                                                                @foreach ($countries as $country)
                                                                                                    <option
                                                                                                        value="{{ $country->id ?? '' }}"
                                                                                                        @if ($formation?->city?->country->id === $country?->id)
                                                                                                        selected @endif
                                                                                                        data-country="{{ $country?->country_id ?? '' }}"
                                                                                                        {{--
                                                                                                        data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png"
                                                                                                        --}}>
                                                                                                        {{ $country?->name ?? '_' }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-3 mb-2">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label>{{ __("generated.Ville") }}</label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            name="city_id" id="filter-ville">
                                                                                            <option value="">
                                                                                                {{ __("generated.Choisir une ville") }}
                                                                                            </option>
                                                                                            @if (isset($cities))
                                                                                                @foreach ($cities as $city)
                                                                                                    <option
                                                                                                        value="{{ $city->id ?? '' }}"
                                                                                                        @if ($formation?->city_id === $city->id)
                                                                                                        selected @endif
                                                                                                        data-country="{{ $city->country?->id ?? '' }}">
                                                                                                        {{ __($city->name ?? '_')}}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                                                    <div
                                                                                        class="form-group mb-2 position-relative is-valid check-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Adresse"
                                                                                                name="address"
                                                                                                value="{{ __($formation?->address) }}"
                                                                                                required
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.Adresse") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('address')
                                                                                        <div
                                                                                            class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-md-3 mb-2">
                                                                                    <div
                                                                                        class="form-group position-relative check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text"
                                                                                                    placeholder="{{ __("generated.Téléphone 1") }}"
                                                                                                    value="{{ $formation?->phone }}"
                                                                                                    required="" name="phone"
                                                                                                    class="form-control border-start-0 translated_text">
                                                                                                <label>{{ __("generated.Téléphone 1") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('phone')
                                                                                        <div
                                                                                            class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>


                                                                                <div class="col-12 col-md-3 mb-2">
                                                                                    <div
                                                                                        class="form-group position-relative check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text"
                                                                                                    placeholder="{{ __("generated.Téléphone 2") }}"
                                                                                                    value="{{ __($formation?->secondary_phone) }}"
                                                                                                    required=""
                                                                                                    name="secondary_phone"
                                                                                                    class="form-control border-start-0 translated_text">
                                                                                                <label>{{ __("generated.Téléphone 2") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('secondary_phone')
                                                                                        <div
                                                                                            class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-md-6 mb-2">
                                                                                    <div
                                                                                        class="form-group position-relative check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text"
                                                                                                    placeholder="{{ __("generated.E-mail") }}"
                                                                                                    name="email"
                                                                                                    value="{{ __($formation?->email) }}"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0 translated_text">
                                                                                                <label>{{ __("generated.E-mail") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6 col-md-3 mb-2">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label>{{ __("generated.Niveau") }}</label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            id="click2e3"
                                                                                            style="padding-top: 9px;"
                                                                                            name="level_id">
                                                                                            <option value="">
                                                                                                {{ __("generated.Choisir un niveau") }}
                                                                                            </option>
                                                                                            @if (isset($levels))
                                                                                                @foreach ($levels as $level)
                                                                                                    <option @if ($formation?->level_id === $level->id)
                                                                                                    selected @endif
                                                                                                        value="{{ $level->id ?? '' }}">
                                                                                                        {{ __($level->label ?? '_') }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6 col-md-3 mb-2  custom-mrg">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label
                                                                                            class="translated_text"><span>{{ __("generated.Diplôme") }}</span>
                                                                                            <span
                                                                                                class="text-themeColor">*</span></label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            name="diploma_id">
                                                                                            <option value="">
                                                                                                {{ __("generated.Choisir un diplôme") }}
                                                                                            </option>
                                                                                            @if (isset($diplomas))
                                                                                                @foreach ($diplomas as $diploma)
                                                                                                    <option @if ($formation?->diploma_id === $diploma->id)
                                                                                                    selected @endif
                                                                                                        value="{{ $diploma->id ?? '' }}">
                                                                                                        {{ __($diploma->label ?? '_')}}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label>{{ __("generated.Option") }}<span
                                                                                                class="text-themeColor">*</span></label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            name="option_id">
                                                                                            <option value="">
                                                                                                {{ __("generated.Choisir une option") }}
                                                                                            </option>
                                                                                            @if (isset($diplomaOptions))
                                                                                                @foreach ($diplomaOptions as $option)
                                                                                                    <option @if ($formation?->option_id === $option->id)
                                                                                                    selected @endif
                                                                                                        value="{{ $option->id ?? '' }}">
                                                                                                        {{ __($option->label ?? '_')}}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-6 col-md-3 mb-2">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label>{{ __("generated.Mention") }}</label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            name="mention">
                                                                                            <option selected id="null-value2">
                                                                                                {{ __("generated.Choisir une mention") }}
                                                                                            </option>
                                                                                            @foreach (App\Enums\Profile\MentionEnum::getAll() as $key => $mention)
                                                                                                <option value="{{ __($mention) }}" @if ($formation?->mention === $mention) selected @endif>
                                                                                                    {{ __($mention) }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6 col-md-3 mb-2">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="date"
                                                                                                value="{{ $formation?->date ? \Carbon\Carbon::parse($formation?->date)->format('Y-m-d') : null }}"
                                                                                                placeholder="Date" value=""
                                                                                                required name="date"
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.Date") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('date')
                                                                                        <div
                                                                                            class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12 mt-4 mb-4">
                                                                                    <button class="btn btn-danger "
                                                                                        type="button"
                                                                                        data-formation-id="{{ __($formation?->id) }}"
                                                                                        onclick="deleteForm('formations', this.dataset.formationId)"
                                                                                        style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                                                                    <button class="btn btn-theme btn-ajouter "
                                                                                        type="button"
                                                                                        onclick="updateForm('formations', 1, 'profile-formation-{{ __($formation?->id) }}')"
                                                                                        data-form-id="update-profile-form-formations"
                                                                                        style="font-size: 12px;float: right;margin-right: 10px; ">{{ __("generated.Modifier") }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <form id="profile-form-formations" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="profile_id" value="{{ $profile_id ?? '' }}" hidden
                                        readonly>

                                    <div class="row" style="padding-left: 28px">
                                        <div class="row justify-content-center mt-5">
                                            <div class="col-12 mb-3" style="width: 150px;">
                                                <div class="col-auto position-relative">
                                                    <figure
                                                        class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                        style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                        <img src="{{ asset('assets/img/icon/empty-logo.png') }}" alt=""
                                                            style="display: none;">
                                                    </figure>
                                                    <div
                                                        class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                        <label
                                                            class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                            <i class="bi bi-camera"></i>
                                                            <input type="file" name="logo"
                                                                class="custom-file-input formation-logo"
                                                                id="formation-logo" accept="image/*" />
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text"
                                                                    placeholder="{{ __("generated.Institution") }}"
                                                                    required name="name"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label><span>{{ __("generated.Institution") }}</span><span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                        @error('name')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label>{{ __("generated.Pays") }}</label>
                                                            <select class="chosenoptgroup w-100" name="country_id"
                                                                id="country-select">
                                                                <option value="">{{ __("generated.Choisir un pays") }}</option>
                                                                @if (isset($countries))
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ __($country->id) }}" {{--
                                                                            data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png"
                                                                            --}}>
                                                                            {{ __($country->name) }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label>{{ __("generated.Ville") }}</label>
                                                            <select class="chosenoptgroup w-100" name="city_id"
                                                                id="filter-ville">
                                                                <option value="">{{ __("generated.Choisir une ville") }}</option>
                                                                @if (isset($cities))
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id ?? '' }}"
                                                                            data-country="{{ $city->country?->id ?? '' }}">
                                                                            {{ __($city->name ?? '_')}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                        <div
                                                            class="form-group mb-2 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text"
                                                                    placeholder="{{ __("generated.Adresse") }}"
                                                                    name="address" value="" required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label>{{ __("generated.Adresse") }}</label>
                                                            </div>
                                                        </div>
                                                        @error('address')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <div
                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        placeholder="{{ __("generated.Téléphone 1") }}"
                                                                        value="" required="" name="phone"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label>{{ __("generated.Téléphone 1") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('phone')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 col-md-3 mb-2">
                                                        <div class="form-group position-relative check-valid is-valid">
                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        placeholder="{{ __("generated.Téléphone 2") }}"
                                                                        value="" required="" name="secondary_phone"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label>{{ __("generated.Téléphone 2") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('secondary_phone')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div
                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="email"
                                                                        placeholder="{{ __("generated.E-mail") }}"
                                                                        name="email" value="" required=""
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label>{{ __("generated.E-mail") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label>{{ __("generated.Niveau") }}</label>
                                                            <select class="chosenoptgroup w-100" id="click2e3"
                                                                name="level_id" style="padding-top: 9px;">
                                                                <option value="">{{ __("generated.Choisir un niveau") }}</option>
                                                                @if (isset($levels))
                                                                    @foreach ($levels as $level)
                                                                        <option value="{{ $level->id ?? '' }}">
                                                                            {{ __($level->label ?? '_') }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2  custom-mrg">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label class="translated_text">{{__("generated.Diplôme")}}
                                                                <span class="text-themeColor">*</span></label>
                                                            <select class="chosenoptgroup w-100" name="diploma_id">
                                                                <option value="">{{ __("generated.Choisir un diplôme") }}
                                                                </option>
                                                                @if (isset($diplomas))
                                                                    @foreach ($diplomas as $diploma)
                                                                        <option value="{{ $diploma->id ?? '' }}">
                                                                            {{ __($diploma->label ?? '_')}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label>{{ __("generated.Option") }} <span
                                                                    class="text-themeColor">*</span></label>
                                                            <select class="chosenoptgroup w-100" name="option_id">
                                                                <option value="">{{ __("generated.Choisir une option") }}
                                                                </option>
                                                                @if (isset($diplomaOptions))
                                                                    @foreach ($diplomaOptions as $option)
                                                                        <option value="{{ $option->id ?? '' }}">
                                                                            {{ __($option->label ?? '_')}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label>{{ __("generated.Mention") }}</label>
                                                            <select class="chosenoptgroup w-100" name="mention">
                                                                <option selected id="null-value2">
                                                                    {{ __("generated.Choisir une mention") }}</option>
                                                                @foreach (App\Enums\Profile\MentionEnum::getAll() as $key => $mention)
                                                                    <option value="{{ __($mention) }}">
                                                                        {{ __($mention) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label
                                                                class="hidden hidlab">{{ __("generated.Mention")}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="date"
                                                                    placeholder="{{ __("generated.Date") }}" value=""
                                                                    required name="date"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label class="translated_text">{{ __("generated.Date")}}
                                                                    <span class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                        @error('date')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-4 mb-4 d-flex justify-content-end gap-2">

                                                        <button class="btn btn-danger mb-2 mx-2 " type="button"
                                                            style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                                        <button class="btn btn-theme btn-ajouter mb-2 " type="button"
                                                            onclick="saveForm('formations', 1)"
                                                            data-form-id="profile-form-formations"
                                                            style="font-size: 12px;float: right;margin-right: 10px;">{{ __("generated.Ajouter") }}</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-12 mb-3">
        <div class="card border-0 p-0">
            <div class="card-header bg-gradient-theme-light">
                <div class="row align-items-center">
                    <h6 class="fw-medium mb-0 ">{{ __("generated.Certifications") }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                {{-- <div class="row">
                                    <h4 class="title custom-title  mt-4 ">{{ __("generated.Certifications") }}</h4>
                                </div> --}}
                                <div class="pt-3" id="certifications-container">
                                    @if (isset($certifications) && count($certifications) > 0)
                                        @foreach ($certifications as $certification)
                                                <div>
                                                    {{-- <div
                                                        class="bg-light-theme card mb-4 shadow-lg border-0 rounded-lg block-view certification-view"
                                                        id="view-certifications-{{ __($certification->id) }}">
                                                        <div class="card-body p-4">
                                                            <div class="row align-items-center justify-content-between">
                                                                <!-- Certification Logo -->
                                                                @if (isset($formation?->logo))
                                                                <div class="col-md-2 text-center">
                                                                    <img src="{{ $certification->getLogoUrl() ?? asset('assets/img/default-logo.png') }}"
                                                                        alt="Logo" class="img-fluid rounded-circle shadow-sm"
                                                                        style="width: 80px; height: 80px; object-fit: cover;">
                                                                </div>
                                                                @endif
                                                                <!-- Certification Details -->
                                                                <div class="col-md-6">
                                                                    <h5 class="text-info mb-3">
                                                                        {{ __($certification->nom_certification) }}</h5>
                                                                    <p class="mb-2"><i class="bi bi-geo-alt-fill text-danger"></i>
                                                                        <strong>{{ __("generated.Ville :") }}</strong>
                                                                        {{ $certification->city->name ?? 'Non disponible' }}
                                                                    </p>
                                                                    <p class="mb-2"><i class="bi bi-globe2 text-success"></i>
                                                                        <strong>{{ __("generated.Pays :") }}</strong>
                                                                        {{ $certification->city->country->name ?? 'Non disponible'
                                                                        }}
                                                                    </p>
                                                                    <p class="mb-2"><i class="bi bi-building text-info"></i>
                                                                        <strong>{{ __("generated.Organisme :") }}</strong>
                                                                        {{ $certification->organisme ?? 'Non disponible' }}
                                                                    </p>
                                                                </div>
                                                                <!-- Action Button -->
                                                                <div class="col-md-4 text-end">
                                                                    <button
                                                                        class="btn btn-outline-danger squered-pill px-3 delete-btn translated_text"
                                                                        data-form-name="certifications"
                                                                        data-id="{{ __($certification->id) }}"
                                                                        aria-label="Supprimer cette certification">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                    <button
                                                                        class="btn btn-outline-info squered-pill px-3 translated_text"
                                                                        data-certification-id="{{ __($certification->id) }}"
                                                                        onclick="toggleFormationForm('certifications', this.dataset.certificationId, true)">
                                                                        <i class="bi bi-pen"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    <div id="form-certifications-{{ __($certification->id) }}" class="edit-subform">
                                                        <form id="profile-certification-{{ __($certification->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="text" name="id" value="{{ $certification->id ?? '' }}"
                                                                hidden readonly>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="row justify-content-center mt-4">
                                                                        <div class="col-12 mb-3" style="width: 150px;">
                                                                            <div class="col-auto position-relative">
                                                                                <figure
                                                                                    class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                    style="background-image: url(&quot;{{ __($certification->logo) }}&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                                                    <img src="{{ $certification->getLogoUrl() }}"
                                                                                        alt="" style="display: none;">
                                                                                </figure>
                                                                                <div
                                                                                    class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                                                    <label
                                                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                                                        <i class="bi bi-camera"></i>
                                                                                        <input type="file" name="logo"
                                                                                            class="custom-file-input certification-logo"
                                                                                            id="certification-logo"
                                                                                            accept="image/*" />
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            <div class="row">
                                                                                <!-- Organisme -->
                                                                                <div
                                                                                    class="col-12 col-md-8 col-lg-9 mb-2 custom-mrg">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="text" name="organisme"
                                                                                                value="{{ __($certification->organisme) }}"
                                                                                                placeholder="Organisme" required
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.Organisme") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('organisme')
                                                                                        <div
                                                                                            class="invalid-feedback mb-3 translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                                <!-- N° d'accréditation -->
                                                                                <div
                                                                                    class="col-12 col-md-4 col-lg-3 mb-2 custom-mrg">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                name="numero_accreditation"
                                                                                                value="{{ __($certification->numero_accreditation) }}"
                                                                                                placeholder="N° d'accréditation"
                                                                                                required
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.N° d'accréditation") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('numero_accreditation')
                                                                                        <div class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="text" name="adresse"
                                                                                                placeholder="Adresse"
                                                                                                value="{{ __($certification->adresse) }}"
                                                                                                required
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.Adresse") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('adresse')
                                                                                        <div class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-6 col-md-3 mb-2">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label>{{ __("generated.Pays") }}</label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            name="country_id" id="country-select">
                                                                                            <option value="">
                                                                                                {{ __("generated.Choisir un pays") }}
                                                                                            </option>
                                                                                            @if (isset($countries))
                                                                                                @foreach ($countries as $country)
                                                                                                    <option value="{{ $country->id ?? '' }}"
                                                                                                        @if ($certification->city?->country->id === $country?->id)
                                                                                                        selected @endif
                                                                                                        data-country="{{ $country?->country_id ?? '' }}">
                                                                                                        {{ $country?->name ?? '_' }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6 col-md-3 mb-2">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                        <label>{{ __("generated.Ville") }}</label>
                                                                                        <select class="chosenoptgroup w-100"
                                                                                            name="city_id" id="filter-ville">
                                                                                            <option value="">
                                                                                                {{ __("generated.Choisir une ville") }}
                                                                                            </option>
                                                                                            @if (isset($cities))
                                                                                                @foreach ($cities as $city)
                                                                                                    <option value="{{ $city->id ?? '' }}"
                                                                                                        @if ($certification->city_id === $city->id)
                                                                                                        selected @endif
                                                                                                        data-country="{{ $city->country?->id ?? '' }}">
                                                                                                        {{ __($city->name ?? '_')}}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-12 col-md-4 mb-2">
                                                                                    <div
                                                                                        class="form-group position-relative check-valid is-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="text" name="telephone_1"
                                                                                                value="{{ __($certification->telephone_1) }}"
                                                                                                placeholder="Téléphone 1" required
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.Téléphone 1") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('telephone_1')
                                                                                        <div class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="col-12 col-md-4 mb-2">
                                                                                    <div
                                                                                        class="form-group position-relative check-valid is-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="text" name="telephone_2"
                                                                                                value="{{ __($certification->telephone_2) }}"
                                                                                                placeholder="Téléphone 2" required
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.Téléphone 2") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('telephone_2')
                                                                                        <div class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="col-12 col-md-4 mb-2">
                                                                                    <div
                                                                                        class="form-group position-relative check-valid is-valid">
                                                                                        <div class="form-floating">
                                                                                            <input type="email" name="email"
                                                                                                value="{{ __($certification->email) }}"
                                                                                                placeholder="E-mail" required
                                                                                                class="form-control border-start-0 translated_text">
                                                                                            <label>{{ __("generated.E-mail") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    @error('email')
                                                                                        <div class="invalid-feedback translated_text">
                                                                                            {{ __($message) }}
                                                                                        </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mt-4 justify-content-center">
                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="nom_certification"
                                                                                                        placeholder="Nom de la certification"
                                                                                                        value="{{ $certification?->nom_certification ?? '' }}"
                                                                                                        required
                                                                                                        class="form-control border-start-0 translated_text">
                                                                                                    <label>{{ __("generated.Nom de la certification") }}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="invalid-feedback ">
                                                                                                {{ __("generated.Please enter valid input") }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                                <label class="translated_text">
                                                                                                    Critères d'évaluation
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                                <select class="form-select border-0"
                                                                                                    id="eval1"
                                                                                                    name="criteres_evaluation"
                                                                                                    style="padding-top: 9px;">
                                                                                                    <option selected value="0"
                                                                                                        id="null-value">
                                                                                                        {{ __("generated.Choisir des critères d'évaluation") }}
                                                                                                    </option>
                                                                                                    @foreach (App\Enums\Profile\EvaluationTypeEnum::getAll() as $key => $criteria)
                                                                                                        <option @if (isset($certification) && $certification?->criteres_evaluation == $key)
                                                                                                        selected @endif
                                                                                                            value="{{ $key }}">
                                                                                                            {{ __($criteria) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="invalid-feedback mb-3 ">
                                                                                        {{ __("generated.Add valid data") }}</div>
                                                                                </div>
                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="theme_certification"
                                                                                                        placeholder="Sujet ou thème de la certification translated_text"
                                                                                                        value="{{ __($certification?->theme_certification) }}"
                                                                                                        required
                                                                                                        class="form-control border-start-0 translated_text">
                                                                                                    <label>{{ __("generated.Sujet ou thème de la certification") }}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="invalid-feedback ">
                                                                                                {{ __("generated.Please enter valid input") }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                <div class="form-floating">
                                                                                                    <input type="number"
                                                                                                        name="score_resultat"
                                                                                                        placeholder="Score ou résultats obtenus"
                                                                                                        value="{{ __($certification?->score_resultat) }}"
                                                                                                        required
                                                                                                        class="form-control border-start-0 translated_text">
                                                                                                    <label>{{ __("generated.Score ou résultats obtenus") }}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="invalid-feedback ">
                                                                                                {{ __("generated.Please enter valid input") }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                                <label
                                                                                                    class="translated_text">Niveau
                                                                                                    de certification
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                                <div class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0 chosenoptgroup w-100"
                                                                                                        name="niveau_certification"
                                                                                                        id="country1"
                                                                                                        style="padding-top: 9px;">
                                                                                                        <option value="">
                                                                                                            {{ __("generated.Choisir le niveau de certification") }}
                                                                                                        </option>
                                                                                                        @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                                                                            <option @if (isset($certification) && $certification?->niveau_certification == $key)
                                                                                                            selected @endif
                                                                                                                value="{{ $key }}">
                                                                                                                {{ __($level) }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                <div class="form-floating">
                                                                                                    <input type="date"
                                                                                                        name="date_obtention"
                                                                                                        value="{{ __($certification?->date_obtention) }}"
                                                                                                        placeholder="Date d'obtention"
                                                                                                        value="" required
                                                                                                        class="form-control border-start-0 translated_text">
                                                                                                    <label>{{ __("generated.Date d'obtention") }}
                                                                                                        <span
                                                                                                            class="text-themeColor">*</span></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="invalid-feedback ">
                                                                                                {{ __("generated.Please enter valid input") }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="volume_horaire"
                                                                                                        value="{{ __($certification?->volume_horaire) }}"
                                                                                                        placeholder="Durée ou volume horaire"
                                                                                                        value="" required
                                                                                                        class="form-control border-start-0 translated_text">
                                                                                                    <label>{{ __("generated.Durée ou volume horaire") }}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="invalid-feedback ">
                                                                                                {{ __("generated.Please enter valid input") }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>



                                                                                <div class="col-5">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                <div class="form-floating">
                                                                                                    <input type="date"
                                                                                                        placeholder="Date d'expiration"
                                                                                                        name="date_expiration"
                                                                                                        value="{{ __($certification?->date_expiration) }}"
                                                                                                        required
                                                                                                        class="form-control border-start-0 translated_text">
                                                                                                    <label>{{ __("generated.Date d'expiration") }}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="invalid-feedback ">
                                                                                                {{ __("generated.Please enter valid input") }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-12 mt-4 mb-4">
                                                                                    <button class="btn btn-danger " type="button"
                                                                                        data-certification-id="{{ __($certification->id) }}"
                                                                                        onclick="deleteForm('certifications', this.dataset.certificationId)"
                                                                                        style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                                                                    <button class="btn btn-theme " type="button"
                                                                                        onclick="updateForm('certifications', 1, 'profile-certification-{{ __($certification->id) }}')"
                                                                                        data-form-id="update-profile-form-certifications"
                                                                                        style="font-size: 12px;float: right;margin-right: 10px;">{{ __("generated.Modifier") }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <br>
                                                    </div>
                                                </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <form method="POST" id="profile-form-certifications">
                                @csrf
                                <input type="text" name="profile_id" value="{{ $profile_id ?? '' }}" hidden readonly>
                                <div class="row justify-content-center mt-4">
                                    <div class="col-12 mb-3" style="width: 150px;">
                                        <div class="col-auto position-relative">
                                            <figure
                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                <img src="{{ asset('assets/img/icon/empty-logo.png') }}" alt=""
                                                    style="display: none;">
                                            </figure>
                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                    <i class="bi bi-camera"></i>
                                                    <input type="file" name="logo"
                                                        class="custom-file-input certification-logo"
                                                        id="certification-logo" accept="image/*" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="row">
                                            <!-- Organisme -->
                                            <div class="col-12 col-md-8 col-lg-9 mb-2 custom-mrg">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="organisme"
                                                            placeholder="{{ __("generated.Organisme") }}" required
                                                            class="form-control border-start-0 translated_text">
                                                        <label>{{ __("generated.Organisme") }}</label>
                                                    </div>
                                                </div>
                                                @error('organisme')
                                                    <div class="invalid-feedback mb-3 translated_text">
                                                        {{ __($message) }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <!-- N° d'accréditation -->
                                            <div class="col-12 col-md-4 col-lg-3 mb-2 custom-mrg">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="numero_accreditation"
                                                            placeholder="{{ __("generated.N° d'accréditation") }}"
                                                            required
                                                            class="form-control border-start-0 translated_text">
                                                        <label>{{ __("generated.N° d'accréditation") }}</label>
                                                    </div>
                                                </div>
                                                @error('numero_accreditation')
                                                    <div class="invalid-feedback translated_text">{{ __($message) }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="adresse"
                                                            placeholder="{{ __("generated.Adresse") }}" required
                                                            class="form-control border-start-0 translated_text">
                                                        <label>{{ __("generated.Adresse") }}</label>
                                                    </div>
                                                </div>
                                                @error('adresse')
                                                    <div class="invalid-feedback translated_text">{{ __($message) }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 col-md-3 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label>{{ __("generated.Pays") }}</label>
                                                    <select class="chosenoptgroup w-100" name="country_id"
                                                        id="country-select">
                                                        <option value="">{{ __("generated.Choisir un pays") }}</option>
                                                        @if (isset($countries))
                                                            @foreach ($countries as $country)
                                                                <option value="{{ __($country->id) }}" {{--
                                                                    data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png"
                                                                    --}}>
                                                                    {{ __($country->name) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-3 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label>{{ __("generated.Ville") }}</label>
                                                    <select class="chosenoptgroup w-100" name="city_id"
                                                        id="filter-ville">
                                                        <option value="">{{ __("generated.Choisir une ville") }}</option>
                                                        @if (isset($cities))
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->id ?? '' }}"
                                                                    data-country="{{ $city->country?->id ?? '' }}">
                                                                    {{ __($city->name ?? '_')}}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-4 mb-2">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="telephone_1"
                                                            placeholder="{{ __("generated.Téléphone 1") }}" required
                                                            class="form-control border-start-0 translated_text">
                                                        <label>{{ __("generated.Téléphone 1") }}</label>
                                                    </div>
                                                </div>
                                                @error('telephone_1')
                                                    <div class="invalid-feedback translated_text">{{ __($message) }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-4 mb-2">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="telephone_2"
                                                            placeholder="{{ __("generated.Téléphone 2") }}" required
                                                            class="form-control border-start-0 translated_text">
                                                        <label>{{ __("generated.Téléphone 2") }}</label>
                                                    </div>
                                                </div>
                                                @error('telephone_2')
                                                    <div class="invalid-feedback translated_text">{{ __($message) }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-4 mb-2">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="form-floating">
                                                        <input type="email" name="email"
                                                            placeholder="{{ __("generated.E-mail") }}" required
                                                            class="form-control border-start-0 translated_text">
                                                        <label>{{ __("generated.E-mail") }}</label>
                                                    </div>
                                                </div>
                                                @error('email')
                                                    <div class="invalid-feedback translated_text">{{ __($message) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-4 justify-content-center">
                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" name="nom_certification"
                                                                    placeholder="Nom de la certification"
                                                                    value="{{ $certification?->nom_certification ?? '' }}"
                                                                    required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label>{{ __("generated.Nom de la certification") }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback ">
                                                            {{ __("generated.Please enter valid input") }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label class="translated_text">
                                                                Critères d'évaluation
                                                                <span class="text-themeColor">*</span></label>
                                                            <select class="form-select border-0" id="eval1"
                                                                name="criteres_evaluation" style="padding-top: 9px;">
                                                                <option selected value="0" id="null-value">
                                                                    {{ __("generated.Choisir des critères d'évaluation") }}
                                                                </option>
                                                                @foreach (App\Enums\Profile\EvaluationTypeEnum::getAll() as $key => $criteria)
                                                                <option @if (isset($certification) && $certification?->criteres_evaluation == $key) selected
                                                                    @endif value="{{ $key }}">
                                                                    {{ __($criteria) }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" name="theme_certification"
                                                                    placeholder="Sujet ou thème de la certification"
                                                                    value="{{ $certification?->theme_certification ?? '' }}"
                                                                    required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label>{{ __("generated.Sujet ou thème de la certification") }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback ">
                                                            {{ __("generated.Please enter valid input") }}</div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="number" name="score_resultat"
                                                                    placeholder="Score ou résultats obtenus"
                                                                    value="{{ $certification?->score_resultat ?? 0 }}"
                                                                    required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label>{{ __("generated.Score ou résultats obtenus") }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback ">
                                                            {{ __("generated.Please enter valid input") }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label class="translated_text">Niveau
                                                                de certification
                                                                <span class="text-themeColor">*</span></label>
                                                            <div class="form-floating">
                                                                <select
                                                                    class="form-select border-0 chosenoptgroup w-100"
                                                                    name="niveau_certification" id="country1"
                                                                    style="padding-top: 9px;">
                                                                    <option selected>
                                                                        {{ __("generated.Choisir le niveau de certification") }}
                                                                    </option>
                                                                    @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                                    <option @if (isset($certification) && $certification?->niveau_certification == $key)
                                                                        selected @endif value="{{ $key }}">
                                                                        {{ __($level) }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="date" name="date_obtention"
                                                                    value="{{ $certification?->date_obtention ?? now() }}"
                                                                    placeholder="Date d'obtention" value="" required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label>{{ __("generated.Date d'obtention") }} <span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback ">
                                                            {{ __("generated.Please enter valid input") }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" name="volume_horaire"
                                                                    value="{{ $certification?->volume_horaire ?? '' }}"
                                                                    placeholder="Durée ou volume horaire" value=""
                                                                    required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label>{{ __("generated.Durée ou volume horaire") }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback ">
                                                            {{ __("generated.Please enter valid input") }}</div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-5">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="date" placeholder="Date d'expiration"
                                                                    value="" name="date_expiration"
                                                                    value="{{ $certification?->date_expiration ?? now() }}"
                                                                    required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label>{{ __("generated.Date d'expiration") }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback ">
                                                            {{ __("generated.Please enter valid input") }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mt-4 mb-4">
                                                <button class="btn btn-danger " type="button"
                                                    style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                                <button class="btn btn-theme btn-ajouter " type="button"
                                                    onclick="saveForm('certifications', 1)"
                                                    data-form-id="profile-form-certifications"
                                                    style="float: right; margin-right: 10px;">{{ __("generated.Ajouter") }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .col-12.col-md-6.col-lg-2.custom-mrg {
        margin-right: -16px;
    }
</style>
<div class="row mt-3 mb-4" style="float: right">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button"
            onclick="switchToNextTab(2)">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>