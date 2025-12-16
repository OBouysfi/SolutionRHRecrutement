<?php

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

        // model name : AssessfirstInvitationHistory
        Schema::create('assessfirst_invitation_history', function (Blueprint $table) {
            $table->id();
            // user foreign key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // foreign key candidate 
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('profiles')->onDelete('cascade');
            // invitation date
            $table->date('date');
            // assessfirst assessfirst_uuid
            $table->string('assessfirst_uuid');
            // invitation status
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessfirst_invitation_history');
    }
};
