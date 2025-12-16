<div class="dropdown text-center">
    <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots" style="font-size: 19px;"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">

        <a class="dropdown-item edit-recruitment-btn translated_text" data-bs-toggle="modal" data-bs-target="#ModalEditRecruitment"
            data-id="{{ __($cost->id) }}" data-platform="{{ __($cost->platform) }}" data-logo="{{ __($cost->logo) }}"
            data-budget="{{ __($cost->budget) }}" data-amount="{{ __($cost->amount) }}" data-invoice="{{ __($cost->invoice) }}"
            data-devise="{{ __($cost->devise) }}"
            data-url-action="{{ route('api.recruitmentCost.update', $cost->id) }}">{{ __("generated.Modifier") }}</a>
        </li>

        </li>
        {{-- <li>
            <a class="dropdown-item" href="#">Détail</a>
        </li> --}}
        <li><button type="button" class="dropdown-item text-danger delete-recruitment-costs "
                data-recruitment-costs-id="{{ __($cost->id) }}">{{ __("generated.Supprimer") }}</button>
        </li>
    </ul>
</div>
