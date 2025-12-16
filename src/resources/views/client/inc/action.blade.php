<div class="dropdown text-center">
    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        @can('client-listing-update')
        <li>
            <a class="dropdown-item " href="{{ route('client.edit.show', $client->id) }}">{{ __("generated.Modifier") }}</a>
        </li>
        @endcan 
        @can('client-listing-detail')
        <li>
            <a class="dropdown-item " href="{{ route('client.view', $client->id) }}" >{{ __("generated.Détails") }}</a>
        </li>
        @endcan 
        @can('client-listing-delete') <li><button type="button" class="dropdown-item text-danger delete-client " data-client-id="{{ __($client->id) }}">{{ __("generated.Supprimer") }}</button></li> @endcan 
    </ul>
</div>