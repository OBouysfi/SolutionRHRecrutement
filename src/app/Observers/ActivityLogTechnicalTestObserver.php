<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\TestResult;
use App\Models\Timeline;

class ActivityLogTechnicalTestObserver
{
    public function created(TestResult $test_result)
    {
        $activityLog = ActivityLog::create([
            'log_type' => 'technical_test',
            'action' => 'invited',
            'user_id' => auth()->id(),
            'profile_id' => $test_result->candidate_id,
        ]);

        // Créer `timelines`
        Timeline::create([
            'activity_log_id' => $activityLog->id,
            'action' => 'invited',
            'description' => "L'utilisateur " . auth()->user()->name . " a invité le profil " . $test_result->profile?->first_name . " " . $test_result->profile?->last_name . "au test technique ". $test_result->test->test_name,
        ]);
    }

    public function updated(TestResult $test_result)
    {
        $activityLog = ActivityLog::create([
            'log_type' => 'technical_test',
            'action' => 'done',
            'user_id' => auth()->id(),
            'profile_id' => $test_result->candidate_id,
        ]);

        // Créer `timelines`
        Timeline::create([
            'activity_log_id' => $activityLog->id,
            'action' => 'updated',
            'description' => "Le profi " . auth()->user()->name . " a passé le test technique " . $test_result->test->test_name . " avec un score de ". $test_result->score,
        ]);
    }
}