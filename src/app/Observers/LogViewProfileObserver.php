<?php

namespace App\Observers;

use App\Models\Profile;

class LogViewProfileObserver
{
    /**
     * Incrémente le compteur de consultations à chaque fois qu'un profil est récupéré.
     *
     * @param Profile $profile
     * @return void
     */
    public function retrieved(Profile $profile)
    {
        // Incrémenter le compteur de consultations
        $profile->increment('total_views');
    }
}
