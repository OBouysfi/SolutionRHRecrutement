<?php

namespace App\Exports;

use App\Models\JobOffer;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class JobOffersExport implements FromView
{
    public function view(): View
    {
        $jobOffers = JobOffer::with(['client', 'trackingApplications'])->get();

        return view('jobOffer.inc.exportJobOffers', compact('jobOffers'));
    }
}
