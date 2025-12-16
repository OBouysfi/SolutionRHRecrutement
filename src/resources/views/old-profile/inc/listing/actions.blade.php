<div class="dropdown text-center">
    <a class="text-secondary" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        @can('profile-detail')
            <li><a class="dropdown-item " href="{{ route('profile.show', $profile->id) }}">Détail") }}</a></li>
        @endcan

        @can('profile-edit')
            <li><a class="dropdown-item " href="{{ route('profile.edit', $profile->id) }}">Éditer") }}</a></li>
        @endcan

        @can('profile-ajouter-au-vivier')
            @if (! $profile->is_talented)
                <li><a class="dropdown-item " href="javascript:void(0)" onclick="confirmAddToVivier({{ $profile->id }})">Ajouter au Vivier") }}</a></li>
            @endif
        @endcan

        @can('profile-activer-profile')
            @if (! $profile->is_active)
                <li><a class="dropdown-item " href="javascript:void(0)" onclick="activateProfile({{ $profile->id }})">Activer le profil") }}</a></li>
            @endif
        @endcan

        @can('profile-desactiver-profile')
            @if ($profile->is_active)
                <li><a class="dropdown-item " href="javascript:void(0)" onclick="deactivateProfile({{ $profile->id }})">Désactiver le profil") }}</a></li>
            @endif
        @endcan

        @can('profile-qualifier-profile')
            @if (! $profile->is_qualified)
                <li><a class="dropdown-item " href="javascript:void(0)" onclick="makeProfileQualified({{ $profile->id }})">Qualifier le profil") }}</a></li>
            @endif
        @endcan

        @can('profile-dequalifier-profile')
            @if ($profile->is_qualified)
                <li><a class="dropdown-item " href="javascript:void(0)" onclick="makeProfileNotQualified({{ $profile->id }})">Déqualifier le profil") }}</a></li>
            @endif
        @endcan

        @can('profile-delete')
            <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile({{ $profile->id }})">Supprimer</a></li>
        @endcan
    </ul>
</div>
