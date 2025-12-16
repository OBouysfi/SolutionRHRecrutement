<?php

namespace App\Observers;

use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use App\Models\TrackingApplication;
use App\Models\ActivityLog;
use App\Models\Timeline;

class ActivityLogAtsObserver
{
    public function updated(TrackingApplication $trackingApplication)
    {
        if ($trackingApplication->isDirty('status_id')) {
            $activityLog = ActivityLog::create([
                'log_type' => 'ats',
                'action' => 'status_changed',
                'user_id' => auth()->id(),
                'ats_id' => $trackingApplication->id,
                'profile_id'=> $trackingApplication->profile_id,
                'new_status_id' => $trackingApplication->status_id,
                'details' => json_encode([
                    'old_status_id' => $trackingApplication->getOriginal('status_id'),
                    'new_status_id' => $trackingApplication->status_id,
                ]),
            ]);

            // Créer `timelines`
            Timeline::create([
                'activity_log_id' => $activityLog->id,
                'action' => 'status_changed',
                'description' => "L'utilisateur " . auth()->user()->name . " a changé le statut du profil " . $trackingApplication->profile->first_name . " " . $trackingApplication->profile->last_name . " à " . StatusTrackingApplicationEnum::getStatusLabel($trackingApplication->status_id) . ".",
            ]);
        }
    }
}