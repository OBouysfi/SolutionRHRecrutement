<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable(); 
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('name');
            $table->unsignedBigInteger('city_id')->nullable(); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('level_id')->nullable(); 
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->unsignedBigInteger('diploma_id')->nullable(); 
            $table->foreign('diploma_id')->references('id')->on('diplomas')->onDelete('cascade');
            $table->unsignedBigInteger('option_id')->nullable(); 
            $table->foreign('option_id')->references('id')->on('diploma_options')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('mention')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');
    }
};
