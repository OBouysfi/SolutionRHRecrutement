<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Timeline;
use Illuminate\Http\Request;

class ActivityLogController extends Controller 
{
    protected $activityLog;

    public function __construct(ActivityLog $activityLog)
    {
        $this->activityLog = $activityLog;
        $this->middleware('permission:logs-access')->only(['listing']);
    }
    /**
     * Afficher tous les logs.
     */
    public function listing()
    {
        $logs = ActivityLog::with(['user', 'profile', 'ats', 'match', 'jobOffer'])
        ->orderBy('created_at', 'desc')
        ->paginate(10); // Affiche 10 logs par page

        return view('setting.logs.listing', compact('logs'));
    }

    /**
     * Afficher les logs pour un profil spécifique.
     */
    public function showProfileLogs($profileId)
    {
        $logs = ActivityLog::where('log_type', 'profile')
            ->where('profile_id', $profileId)
            ->with(['user', 'profile'])
            ->orderBy('created_at', 'desc');

        return view('activityLogs.profile', compact('logs'));
    }
    /**
     * Afficher les logs pour un matching spécifique.
     */
    public function showMatchingLogs($matchId)
    {
        $logs = ActivityLog::where('log_type', 'match')
            ->where('match_id', $matchId)
            ->with(['user', 'match'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('activityLogs.matching', compact('logs'));
    }

    /**
     * Afficher les logs pour une offre d'emploi spécifique.
     */
    public function showJobOfferLogs($jobOfferId)
    {
        $logs = ActivityLog::where('log_type', 'job_offer')
            ->where('job_offer_id', $jobOfferId)
            ->with(['user', 'jobOffer'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('activityLogs.job_offer', compact('logs'));
    }
}