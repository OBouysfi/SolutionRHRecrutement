<?php

use App\Enums\TrackingApplication\StatusTrackingApplicationEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tracking_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_offer_id', false, true);
            $table->bigInteger('profile_id', false, true);
            $table->tinyInteger('status_id', false, true)->default(StatusTrackingApplicationEnum::SHORTLIST);
            $table->text('reason')->nullable();
            $table->boolean('is_abandon_candidature')->default(false);
            $table->text('comments')->nullable();
            $table->text('tags')->nullable();
            $table->text('histories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_applications');
    }
};
