<table>
    <thead>
        <tr>
            <th >{{ __("generated.N°") }}</th>
            <th >{{ __("generated.Client") }}</th>
            <th >{{ __("generated.Date début") }}</th>
            <th >{{ __("generated.Date fin") }}</th>
            <th >{{ __("generated.Poste") }}</th>
            <th >{{ __("generated.Durée") }}</th>
            <th >{{ __("generated.Présélectionnés") }}</th>
            <th >{{ __("generated.En entretien") }}</th>
            <th >{{ __("generated.Retenus") }}</th>
            <th >{{ __("generated.Embauchés") }}</th>
            <th >{{ __("generated.Rejetés") }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobOffers as $jobOffer)
            @php
                $duration = $jobOffer->duration;
                if ($duration != null && $duration > 12) {
                    $years = floor($duration / 12);
                    $remainingMonths = $duration % 12;
                    $duration = $years == 1
                        ? "$years an et $remainingMonths mois"
                        : "$years ans et $remainingMonths mois";
                } elseif ($duration != null && $duration <= 12) {
                    $duration = "$duration mois";
                } else {
                    $duration = ' - ';
                }

                $interview = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::INTERVIEW)); 
                $retained = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::RETAINED)); 
                $hired = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::HIRING)); 
                $rejected = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::DISCARDED));
              @endphp
            <tr>
                <td class=" translated_text">{{ __($jobOffer->id) }}</td>
                <td class=" translated_text">{{ $jobOffer->client->name ?? '-' }}</td>
                <td class=" translated_text">{{ $jobOffer->mission_started_at ? $jobOffer->mission_started_at->format('d/m/Y') : '-' }}</td>
                <td class=" translated_text">{{ $jobOffer->mission_finished_at ? $jobOffer->mission_finished_at->format('d/m/Y') : '-' }}</td>
                <td class=" translated_text">{{ $jobOffer->title ?? '-' }}</td>
                <td class=" translated_text">{{ __($duration) }}</td>
                <td class=" translated_text">{{ $jobOffer->trackingApplications->count() }}</td>
                <td class=" translated_text">{{ __($interview) }}</td>
                <td class=" translated_text">{{ __($retained) }}</td>
                <td class=" translated_text">{{ __($hired) }}</td>
                <td class=" translated_text">{{ __($rejected) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
