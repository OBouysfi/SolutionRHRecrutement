<br>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        border-radius: 8px !important;
        padding: 0px;
        /* background-color: #fff; */
        /* border: 4px solid #fff; */
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
        padding-left: 45px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: var(--adminux-theme-text);
        border-right: 1px solid var(--adminux-theme-text) !important;
        line-height: 24px !important;
        font-size: 28px;
        padding: 0 10px 0 10px !important;
        margin-left: 0 !important;
        /* background-color: #FFF !important; */
        font-weight: 300;
        height: 25px;
        margin-top: 8px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: var(--adminux-theme-text);
        border-right: 1px solid var(--adminux-theme-text) !important;
        line-height: 24px !important;
        font-size: 28px;
        font-weight: 300;
        padding: 0 10px 0 10px !important;
        /* background-color: #FFF !important; */
        margin-left: 0 !important;
        margin-top: 8px;
        height: 25px;
    }


    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: var(--adminux-theme-lighten);
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple,
    .select2-container--default .select2-selection--multiple {
        min-height: 60 !important;
        border-color: var(--adminux-theme);
    }

    .select2-container--default .select2-search--inline .select2-search__field {
        margin-bottom: 10px;
    }

    .select2-selection__clear {
        display: none !important;
        opacity: 0 !important;
    }

    .nav-item,
    .footer-tabs .nav-item>.nav-link.active {
        outline: none !important;
        border: none !important;
        box-shadow: none !important;
    }

    .toggle-permissions {
        border: 2px solid var(--adminux-theme-darken) !important;
        height: 35px;
    }

    .toggle-permissions i {
        color: var(--adminux-theme-darken);
    }
</style>

    <style>
    .chosen-container .chosen-choices {
        background-color: transparent !important;
    }

    .chosen-container-multi .chosen-choices {
        background-color: transparent !important;
    }
</style>

<div class="container">
    {{-- <select class="form-select" id="parentSelect" multiple>
        <!-- Options injected dynamically -->
    </select>
    <div class="row mt-4" id="permissionCards">
        
    </div> --}}

    {{-- <select class="form-select" id="parentSelect" multiple>
        @foreach ($permissions as $parent => $group)
            <option value="{{ __($parent) }}">{{ __($parent) }}</option>
        @endforeach
    </select> --}}
    <div class="form-group check-valid is-valid">
        <div  class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
            <label><span class=" translated_text"></span></label>
            <select required  class="chosenoptgroup w-100 input-1 select2" style="width: 100%" data-placeholder="Sélectionnez certaines options"
                onfocus="setFocus(true)" onblur="setFocus(false)" id="parentSelect" multiple>
                 @foreach ($permissions as $parent => $group)
                    <option value="{{ __($parent) }}">{{ ucfirst($parent) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-4" id="permissionCards">
        @foreach ($permissions as $parent => $group)
            @php $paneId = 'card-' . Str::slug($parent); @endphp
            <div class="col-md-12 mb-3 permission-card d-none" data-parent="{{ __($parent) }}">
                <div class="card border-0 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="text-capitalize fw-bold">{{ __($parent) }}</h4>
                            <span class="text-muted role_name"> </span>
                        </div>
                        <button class="btn   toggle-permissions" data-target="#{{ __($paneId) }}">
                            <i class="bi bi-arrows-collapse"></i>
                        </button>
                    </div>
                    <div class="card-body collapse" id="{{ __($paneId) }}">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th class="fw-bold ">{{ __("generated.DROIT") }}</th>
                                        <th class="fw-bold text-center ">{{ __("generated.Action") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group as $permission)
                                        <tr>
                                            <td><strong>{{ __($permission->task) }}</strong></td>
                                            <td class="text-center" style="width: 300px;">
                                                <div
                                                    class="form-check form-switch d-flex justify-content-center align-items-center">
                                                    <input class="form-check-input permission-switch" type="checkbox"
                                                        data-permission-id="{{ __($permission->id) }}">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-5 mb-4" style="float: right;">
        <div class="col-auto">
            <button class="btn btn-theme " onclick="goToRoles()" data-form-id="profile-form-informations"
                type="button">{{ __("generated.Enregister") }}</button>
        </div>
    </div>
</div>

{{-- <div id="loader" class="text-center my-3" style="display: none;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div> --}}
<script>
    function goToRoles() {
        const tabTriggerEl = document.querySelector('#tab1120-tab');
        const tab = new bootstrap.Tab(tabTriggerEl);
        tab.show();
    }
</script>
