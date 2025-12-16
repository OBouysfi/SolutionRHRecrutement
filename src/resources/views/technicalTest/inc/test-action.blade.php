<div style="display: flex;justify-content: center;align-items: center;">
    @if ($test->tag === 'manual')
        @can('test-technique-edit-gestion-tests')
            <a href="{{ route('technicalTest.edit.test', $test->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" class="translated_text"
               title="Modifier">
                <i class="bi bi-pencil-square avatar   rounded h5"
                   style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
            </a>
        @endcan

        <a href="{{ route('technicalTest.preview.test', $test->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" class="translated_text"
           title="Modifier">
            <i class="bi bi-eye avatar   rounded h5"
               style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i>
        </a>

        @can('test-technique-delete-gestion-tests')
            <i class="bi bi-trash delete-test " data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer"
               data-test-id="{{ __($test->id) }}" style="font-size: 19px;color: #2473cf;"></i>
        @endcan
    @endif
</div>

