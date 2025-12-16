<?php

namespace App\Jobs\JobOffer;

use App\Models\JobOffer;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateJobOfferStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $today = Carbon::now()->toDateString();

        // Mettre à jour les offres d'emploi où mission_started_at = today et status_id = 2 (Ne pas démarrer)
        JobOffer::whereDate('mission_started_at', $today)
            ->where('status_id', 2)
            ->update(['status_id' => 3]); // 3 = "En cours"

        // \Log::info("test ");

        // // Mettre à jour les offres où mission_finished_at = today et status_id = 3 (En cours)
        // JobOffer::where('status_change_mode', 1)
        //     ->whereDate('mission_finished_at', $today)
        //     ->where('status_id', 3)
        //     ->update(['status_id' => 4]); // 4 = "Terminé"
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
