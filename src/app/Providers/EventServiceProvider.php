<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\JobOfferExperience;
use App\Models\JobOfferFormation;
use App\Models\JobOfferSkill;
use App\Models\MobilityOption;
use App\Models\ProfileSkill;
use App\Observers\ExperienceJobOfferObserver;
use App\Observers\ExperienceProfileObserver;
use App\Observers\FormationJobOfferObserver;
use App\Observers\FormationProfileObserver;
use App\Observers\JobOfferMobilityObserver;
use App\Observers\JobOfferSkillObserver;
use App\Observers\ProfileMobilityObserver;
use App\Observers\ProfileSkillObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Event;
use App\Models\Profile;
use App\Models\JobOffer;
use App\Observers\EventObserver;
use App\Observers\ProfileObserver;
use App\Observers\JobOfferObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Illuminate\Auth\Events\Login' => [
        'App\Listeners\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\LogFailedLogin',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
         Profile::observe(ProfileObserver::class);
        JobOffer::observe(JobOfferObserver::class);
        JobOfferSkill::observe(JobOfferSkillObserver::class);
        JobOfferExperience::observe(ExperienceJobOfferObserver::class);
        JobOfferFormation::observe(FormationJobOfferObserver::class);
        MobilityOption::observe(JobOfferMobilityObserver::class);
         ProfileSkill::observe(ProfileSkillObserver::class);
         MobilityOption::observe(ProfileMobilityObserver::class);
         Formation::observe(FormationProfileObserver::class);
         Experience::observe(ExperienceProfileObserver::class);
        // Event::observe(EventObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return true;
    }
}
