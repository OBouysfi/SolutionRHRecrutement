<?php

use App\Enums\Interview\StatusInterviewEnum;
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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_offer_id', false, true);
            $table->bigInteger('profile_id', false, true);
            $table->string('site_address')->nullable();

            $table->string('rh_evaluator', 255)->nullable();
            $table->string('tech_evaluator', 255)->nullable();
            $table->bigInteger('rh_evaluator_weight')->nullable();
            $table->string('tech_evaluator_weight')->nullable();

            // $table->bigInteger('manager_user_id', false, true);
            // $table->tinyInteger('manager_weight')->default(1);
            $table->boolean('is_recalculate_matching')->default(0);
            $table->tinyInteger('status_id')->default(StatusInterviewEnum::OPENED);
            $table->string('code', 40);
            $table->boolean('is_remotely');
            $table->string('remotely_url')->nullable();

            $table->timestamp('scheduled_at');
            $table->timestamps();

            $table->index('job_offer_id');
            $table->index('profile_id');
            // $table->index('manager_user_id');
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
