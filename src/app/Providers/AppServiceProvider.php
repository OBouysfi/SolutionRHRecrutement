<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Models\Support;
use App\Observers\SupportObserver;
use App\Models\Profile;
use App\Models\TrackingApplication;
use App\Observers\ActivityLogProfileObserver;
use App\Observers\ActivityLogAtsObserver;
use App\Models\Matching;
use App\Models\JobOffer;
use App\Observers\ActivityLogMatchingObserver;
use App\Observers\ActivityLogJobOfferObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }
        Carbon::setLocale(session('locale'));
        
        Support::observe(SupportObserver::class);
        Profile::observe(ActivityLogProfileObserver::class);
        TrackingApplication::observe(ActivityLogAtsObserver::class);
        Matching::observe(ActivityLogMatchingObserver::class);
        JobOffer::observe(ActivityLogJobOfferObserver::class);
    }
}
