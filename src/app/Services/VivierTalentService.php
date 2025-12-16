<?php

namespace App\Services;

use App\Models\Profile;
use App\Models\TrackingApplication;
use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VivierTalentService
{
    /**
     * Calculate monthly conversion rates for talented profiles
     * 
     * @param string|null $startDate
     * @param string|null $endDate
     * @return array
     */
    public function calculateMonthlyConversionRates($startDate = null, $endDate = null)
    {
        // If no dates provided, use current year
        $startDate = $startDate ?? Carbon::now()->startOfYear();
        $endDate = $endDate ?? Carbon::now()->endOfYear();

        $months = collect();
        $rates = collect();

        // Generate all months between start and end date
        $currentDate = Carbon::parse($startDate)->startOfMonth();
        $lastDate = Carbon::parse($endDate)->endOfMonth();

        while ($currentDate <= $lastDate) {
            $monthStart = $currentDate->copy()->startOfMonth();
            $monthEnd = $currentDate->copy()->endOfMonth();

            // Get total applications for talented profiles in this month
            $totalApplications = TrackingApplication::whereHas('profile', function ($query) {
                $query->where('is_talented', 1);
            })
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->count();

            // Get hired applications for talented profiles in this month
            $hiredApplications = TrackingApplication::whereHas('profile', function ($query) {
                $query->where('is_talented', 1);
            })
            ->where('status_id', StatusTrackingApplicationEnum::HIRING)
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->count();

            // Calculate conversion rate
            $rate = $totalApplications > 0 ? ($hiredApplications / $totalApplications) * 100 : 0;

            $months->push(__($currentDate->format('M')));
            $rates->push(round($rate, 2));

            $currentDate->addMonth();
        }

        return [
            'months' => $months->toArray(),
            'rates' => $rates->toArray()
        ];
    }

    /**
     * Calculate monthly recruiter satisfaction rates
     * (Hired + Retained) / Total applications
     * 
     * @param string|null $startDate
     * @param string|null $endDate
     * @return array
     */
    public function calculateRecruiterSatisfactionRates($startDate = null, $endDate = null)
    {
        $startDate = $startDate ?? Carbon::now()->startOfYear();
        $endDate = $endDate ?? Carbon::now()->endOfYear();

        $months = collect();
        $rates = collect();

        $currentDate = Carbon::parse($startDate)->startOfMonth();
        $lastDate = Carbon::parse($endDate)->endOfMonth();

        while ($currentDate <= $lastDate) {
            $monthStart = $currentDate->copy()->startOfMonth();
            $monthEnd = $currentDate->copy()->endOfMonth();

            // Get total applications in this month
            $totalApplications = TrackingApplication::whereBetween('created_at', [$monthStart, $monthEnd])
                ->count();

            // Get retained and hired applications in this month
            $satisfiedApplications = TrackingApplication::whereBetween('created_at', [$monthStart, $monthEnd])
                ->whereIn('status_id', [
                    StatusTrackingApplicationEnum::RETAINED,
                    StatusTrackingApplicationEnum::HIRING
                ])
                ->count();

            // Calculate satisfaction rate
            $rate = $totalApplications > 0 ? ($satisfiedApplications / $totalApplications) * 100 : 0;

            $months->push(__($currentDate->format('M')));
            $rates->push(round($rate, 2));

            $currentDate->addMonth();
        }

        return [
            'months' => $months->toArray(),
            'rates' => $rates->toArray()
        ];
    }  
}