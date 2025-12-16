<div class="dropdown text-center">
    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots" style="font-size: 19px;"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item " href="{{ route('evaluator.edit.show', $evaluator->id) }}">{{ __('generated.Modifier') }}</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('evaluator.view', $evaluator->id) }}" >{{ __('generated.Détail') }}</a>
        </li>
        <li>
            <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="delete_evaluator({{ $evaluator->id }})">
            {{ __('generated.Supprimer') }}
            </a>
        </li>
    </ul>
</div>
