<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class TimelineService
{
    public function getProfileActions($profileId)
    {
        // Fetch profile creation action
        $creationAction = Profile::where('id', $profileId)
            ->with('user')
            ->select('id', 'user_id', 'created_at')
            ->first();

        // Fetch logs for other actions
        $logActions = Log::where('profile_id', $profileId)
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'creation' => $creationAction,
            'logs' => $logActions,
        ];
    }
}
