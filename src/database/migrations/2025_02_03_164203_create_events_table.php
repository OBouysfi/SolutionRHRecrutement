<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('event_type');
            $table->string('event_url')->nullable();
            $table->string('location')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('reminder')->default(15);
            $table->boolean('high_importance')->default(false);
            $table->string('event_platforme')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_favorite')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->foreignId('job_offer_id')->constrained('job_offers')->onDelete('cascade');
            // $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
