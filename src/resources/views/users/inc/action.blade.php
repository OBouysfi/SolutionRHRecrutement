<div class="dropdown text-center">
    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots" style="font-size: 19px;"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>

            <a type="button" class="dropdown-item edit-user-btn" data-bs-toggle="modal" data-bs-target="#EditUser"
                data-id="{{ __($User->id) }}" data-name="{{ __($User->name) }}" data-email="{{ __($User->email) }}"
                data-role="{{ optional($User->roles->first())->id }}" data-status="{{ __($User->status) }}"
                data-image="{{ $User->getAvatarUrl() }}">
                Modifier
            </a>

        </li>
        <li>


            <a type="button" class="dropdown-item view-user-btn" data-bs-toggle="modal" data-bs-target="#ViewUser"
                data-id="{{ __($User->id) }}" data-name="{{ __($User->name) }}" data-email="{{ __($User->email) }}"
                data-role="{{ optional($User->roles->first())->id }}" data-status="{{ __($User->status) }}"
                data-image="{{ $User->getAvatarUrl() }}">
                Détail
            </a>

        </li>
        <li><button type="button" class="dropdown-item text-danger delete-user"
                data-user-id="{{ __($User->id) }}">Supprimer</button></li>

    </ul>
</div>
