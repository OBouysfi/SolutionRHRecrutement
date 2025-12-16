<div class="d-flex justify-content-center">
    @if(isset($result) && isset($result->profile))
        @if($result?->status == 'brouillon')
            <i class="bi bi-check-circle accept-test-result"

               id="invite-test"
               data-test-result-id="{{ $result?->id }}"
               data-test-id="{{ $result?->test?->id }}"
               data-candidate-id="{{ $result?->profile?->id }}"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Inviter au test" style="font-size: 19px;color: #2473cf;"></i>
        @endif


        <a href="{{ route('technicalTest.sheet.detail', ['resultId' => $result?->id,'testId' => $result?->test?->id, 'candidateId' => $result?->profile?->id]) }}"><i class="bi bi-file-earmark-text translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="Détail" style="font-size: 19px;;color: #2473cf;"></i></a>
        <i class="bi bi-trash delete-test-result"
           data-test-result-id="{{ $result?->id }}"
           data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer" style="font-size: 19px;color: #2473cf;"></i>

        @if($result->profile?->id == auth()->user()?->id && $result?->status == 'invited')
            <a href="{{ route('technicalTest.test.start', ['testId' => $result?->test?->id, 'candidateId' => $result?->profile?->id]) }}">
                <i class="bi bi-play-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Commencer le test" style="font-size: 19px;color: #2473cf;"></i>
            </a>
        @endif


    @endif
</div>

