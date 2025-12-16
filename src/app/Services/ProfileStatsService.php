<?php

namespace App\Services;

use App\Models\Profile;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use App\Models\Matching;


class ProfileStatsService
{
    public function getChartData()
    {
        $now = Carbon::now();
        $months = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = $now->copy()->subMonths($i);
            $monthKey = $date->format('Y-m');
            $months[$monthKey] = [
                'label' => __($date->translatedFormat('F')),
                'all_profiles' => 0,
                'active_profiles' => 0,
                'qualified_profiles' => 0,
                'validation_profiles' => 0
            ];
        }

        // statistic for pertinent 
        $monthlyStats = Profile::selectRaw("
            YEAR(created_at) as year,
            MONTH(created_at) as month,
            COUNT(*) as all_profiles,
            SUM(is_active) as active_profiles,
            SUM(is_qualified) as qualified_profiles,
            COUNT(CASE WHEN is_active = 0 THEN 1 END) as validation_profiles
        ")
            ->where('created_at', '>=', $now->subMonths(12))
            ->groupByRaw("YEAR(created_at), MONTH(created_at)")
            ->orderByRaw("YEAR(created_at) ASC, MONTH(created_at) ASC")
            ->get();

        // Merge database results into the months array
        foreach ($monthlyStats as $stat) {
            $monthKey = sprintf('%04d-%02d', $stat->year, $stat->month);
            if (isset($months[$monthKey])) {
                $months[$monthKey]['all_profiles'] = $stat->all_profiles;
                $months[$monthKey]['active_profiles'] = $stat->active_profiles;
                $months[$monthKey]['qualified_profiles'] = $stat->qualified_profiles;
                // $months[$monthKey]['validation_profiles'] = $stat->validation_profiles;
            }
        }
        $monthlyStats = Matching::selectRaw("
        COUNT(DISTINCT profile_id) as matched_profiles,
        YEAR(created_at) as year,
        MONTH(created_at) as month
        ")
        ->where('created_at', '>=', now()->subMonths(12)) 
        ->groupByRaw("YEAR(created_at), MONTH(created_at)")
        ->orderByRaw("YEAR(created_at) ASC, MONTH(created_at) ASC")
        ->get();

        foreach ($monthlyStats as $stat) {
            $monthKey = sprintf('%04d-%02d', $stat->year, $stat->month);
            if (isset($months[$monthKey])) {
                $months[$monthKey]['validation_profiles'] = $stat->matched_profiles; 
            }
        }


        return [
            'labels' => array_column($months, 'label'),
            'all_profiles' => array_column($months, 'all_profiles'),
            'active_profiles' => array_column($months, 'active_profiles'),
            'qualified_profiles' => array_column($months, 'qualified_profiles'),
            'validation_profiles' => array_column($months, 'validation_profiles'),
        ];
    }    
}