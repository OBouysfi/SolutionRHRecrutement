{{-- !-- Début des onglets "TYPES ROLES" --> --}}
{{-- <div class="row mb-4" style="margin-top: -2px !important">
    <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab1" role="tablist">
        @foreach ($role_types as $key => $roleType)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $key == 0 ? 'active' : '' }}"
                    id="tR{{ $key }}-tab" data-bs-toggle="tab"
                    data-bs-target="#tR{{ $key }}" type="button" role="tab"
                    aria-controls="tR{{ $key }}"
                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ __($roleType->name) }}</button>
            </li>
        @endforeach
    </ul>
</div> --}}
{{-- <div class="row mb-4" style="margin-top: -2px !important"> --}}
{{-- <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab1" role="tablist">
        @if (isset($permissionModels))
            @foreach ($permissionModels as $permissionModel)
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tR-tab" data-bs-toggle="tab" data-bs-target="#tR" type="button"
                        role="tab" aria-controls="tR" aria-selected="">{{ __($permissionModel->name) }}</button>
                </li>
            @endforeach
        @endif
         <li class="nav-item" role="presentation">
            <button class="nav-link" id="tR-tab" data-bs-toggle="tab" data-bs-target="#tR" type="button"
                role="tab" aria-controls="tR" aria-selected="">CVThèque</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tR-tab" data-bs-toggle="tab" data-bs-target="#tR" type="button"
                role="tab" aria-controls="tR" aria-selected="">Vivier Talent</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tR-tab" data-bs-toggle="tab" data-bs-target="#tR" type="button"
                role="tab" aria-controls="tR" aria-selected="">Client</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tR-tab" data-bs-toggle="tab" data-bs-target="#tR" type="button"
                role="tab" aria-controls="tR" aria-selected=""> Missions</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tR-tab" data-bs-toggle="tab" data-bs-target="#tR" type="button"
                role="tab" aria-controls="tR" aria-selected="">Matching</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tR-tab" data-bs-toggle="tab" data-bs-target="#tR" type="button"
                role="tab" aria-controls="tR" aria-selected="">ATS</button>
        </li> 
    </ul> --}}

{{-- <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="permissionsTabs" role="tablist">
</ul>

<div class="tab-content" id="permissionsTabContent">
</div> --}}

{{-- </div> --}}
{{-- <div class="row">
    <div class="col-12">
        <div class="card border-0"  >
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row px-3">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table align-middle">
                                                <thead>
                                                    <tr class="align-middle" style="border-top: 1px solid #e9e9e9;">
                                                        <th class="fw-bold">DROIT</th>
                                                        <th class="fw-bold text-center" id="roleID">
                                                            @isset($role)
                                                                {{ __($role->name) }}
                                                            @endisset
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="rolePermissionsTab">
                                                    @if (isset($permissionModels))
                                                        @foreach ($rolePermissions as $rolePermission)
                                                            <tr>
                                                                <td>
                                                                    <div><strong>{{ __($rolePermission->action) }}</strong>
                                                                    </div>
                                                                    <small
                                                                        class="text-muted">{{ __($rolePermission->task) }}</small>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div
                                                                        class="form-check form-switch d-flex justify-content-center align-items-center">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="permission1">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
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
</div> --}}



<div class="container">
    <div class="overflow-auto" style="white-space: nowrap;">
        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-start flex-nowrap" id="permissionsTabs" role="tablist">
            <!-- Tabs will be injected here -->
        </ul>
    </div>
    <br>
    <div class="card pt-0 border-0"  >
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="permissionsTabContent">

                        {{-- AJAX will populate tab panes here --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
