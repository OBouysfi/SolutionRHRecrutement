<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\AssessfirstInvitationHistory;
use App\Models\Timeline;

class ActivityLogPersonnalTestObserver
{
    public function created(AssessfirstInvitationHistory $personnal_test)
    {
        $activityLog = ActivityLog::create([
            'log_type' => 'personnal_test',
            'action' => 'invited',
            'user_id' => auth()->id(),
            'profile_id' => $personnal_test->candidate_id,
        ]);

        // Créer `timelines`
        Timeline::create([
            'activity_log_id' => $activityLog->id,
            'action' => 'invited',
            'description' => "L'utilisateur " . auth()->user()->name . " a invité le profil " . $personnal_test->profile?->first_name . " " . $personnal_test->profile?->last_name . "au test personnalité",
        ]);
    }

    public function updated(AssessfirstInvitationHistory $personnal_test)
    {
        $activityLog = ActivityLog::create([
            'log_type' => 'personnal_test',
            'action' => 'done',
            'user_id' => auth()->id(),
            'profile_id' => $personnal_test->candidate_id,
        ]);

        // Créer `timelines`
        Timeline::create([
            'activity_log_id' => $activityLog->id,
            'action' => 'updated',
            'description' => "Le profi " . $personnal_test->profile?->first_name . " " . $personnal_test->profile?->last_name . "  a passé le test de personnalité. ",
        ]);
    }
}
