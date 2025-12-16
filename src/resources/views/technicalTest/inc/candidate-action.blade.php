{{-- @can('test-technique-detail-candidats')
    <a href="{{ route('technicalTest.sheet', $candidate->id) }}">
        <i class="bi bi-file-earmark-person translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Aperçu") }}"
            style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
    </a>
@endcan

@can('profile-delete')
    <a href="{{ route('profile.edit', $candidate->id) }}">
        <i class="bi bi-pencil-square avatar   rounded h5"
            style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
    </a>
@endcan

@can('profile-delete')
    <i class="bi bi-trash delete-candidate " data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer"
        data-candidate-id="{{ __($candidate->id) }}" style="font-size: 19px;color: #2473cf;">") }}</i>
@endcan --}}
<div class="d-flex justify-content-start gap-2 action-icons align-items-center">
    @can('test-technique-detail-candidats')
        <a href="{{ route('technicalTest.sheet', $candidate->id) }}">
            <i class="bi bi-file-earmark-person translated_text" data-bs-toggle="tooltip" title="{{ __("generated.Aperçu") }}"
                style="font-size: 19px; color: #2473cf; cursor: pointer;"></i>
        </a>
    @endcan

    @can('profile-delete')
        <a href="{{ route('profile.edit', $candidate->id) }}" title="Modifier">
            <i class="bi bi-pencil-square avatar rounded h5" style="font-size: 19px; color: #2473cf; cursor: pointer;"></i>
        </a>
    @endcan

    @can('profile-delete')
        <a href="#" title="Supprimer" class="delete-candidate" data-bs-toggle="tooltip" data-candidate-id="{{ __($candidate->id) }}">
            <i class="bi bi-trash delete-candidate " data-bs-toggle="tooltip" title="Supprimer"
               data-candidate-id="{{ __($candidate->id) }}" style="font-size: 19px; color: #2473cf; cursor: pointer;"></i>
        </a>

    @endcan
</div>
