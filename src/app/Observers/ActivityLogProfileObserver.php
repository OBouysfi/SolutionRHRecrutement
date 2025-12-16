<?php

namespace App\Observers;

use App\Models\Profile;
use App\Models\ActivityLog;
use App\Models\Timeline;

class ActivityLogProfileObserver
{
    public function created(Profile $profile)
    {
        $activityLog = ActivityLog::create([
            'log_type' => 'profile',
            'action' => 'created',
            'user_id' => auth()->id(),
            'profile_id' => $profile->id,
            'profile_modified_date' => now(),
        ]);

        // Créer `timelines`
        Timeline::create([
            'activity_log_id' => $activityLog->id,
            'action' => 'created',
            'description' => "L'utilisateur " . auth()->user()->name . " a créé le profil " . $profile->first_name . " " . $profile->last_name . ".",
        ]);
    }

    public function updated(Profile $profile)
    {
        $activityLog = ActivityLog::create([
            'log_type' => 'profile',
            'action' => 'updated',
            'user_id' => auth()->id(),
            'profile_id' => $profile->id,
            'profile_modified_date' => now(),
            'details' => json_encode([
                'old_is_talented' => $profile->getOriginal('is_talented'),
                'new_is_talented' => $profile->is_talented,
            ]),
        ]);

        // Créer `timelines`
        Timeline::create([
            'activity_log_id' => $activityLog->id,
            'action' => 'updated',
            'description' => "L'utilisateur " . auth()->user()->name . " a mis à jour le profil " . $profile->first_name . " " . $profile->last_name . ".",
        ]);
    }

    public function deleted(Profile $profile)
    {
        $activityLog = ActivityLog::create([
            'log_type' => 'profile',
            'action' => 'deleted',
            'user_id' => auth()->id(),
            'profile_id' => $profile->id,
            'profile_modified_date' => now(),
        ]);

        // Créer `timelines`
        Timeline::create([
            'activity_log_id' => $activityLog->id,
            'action' => 'deleted',
            'description' => "L'utilisateur " . auth()->user()->name . " a supprimé le profil " . $profile->first_name . " " . $profile->last_name . ".",
        ]);
    }
}