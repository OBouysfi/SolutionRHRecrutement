<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialite', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->text('token_google')->nullable();
            $table->text('refreshToken_google')->nullable();
            $table->boolean('status_google')->default(0);
            $table->text('token_microsoft')->nullable();
            $table->text('refreshToken_microsoft')->nullable();
            $table->boolean('status_microsoft')->default(0);
            $table->text('token_zoom')->nullable();
            $table->text('refreshToken_zoom')->nullable();
            $table->boolean('status_zoom')->default(0);
            $table->text('token_outlook')->nullable();
            $table->text('refreshToken_outlook')->nullable();
            $table->boolean('status_outlook')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialite');
    }
}