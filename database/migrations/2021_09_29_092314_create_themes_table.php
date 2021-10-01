<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('title')->nullable();
            $table->string('primary_text_color')->nullable();
            $table->string('primary_background_type')->nullable();
            $table->string('primary_background')->nullable();
            $table->string('secondary_background')->default(0)->nullable();
            $table->string('secondary_background_color')->nullable();
            $table->string('profile_picture_shadow')->nullable();
            $table->string('profile_picture_border')->nullable();
            $table->string('profile_picture_border_color')->nullable();
            $table->string('card_shadow')->nullable();
            $table->string('card_spacing')->nullable();
            $table->string('button_color')->nullable();
            $table->string('button_text_color')->nullable();
            $table->string('button_corner')->nullable();
            $table->string('button_border')->nullable();
            $table->string('button_border_color')->nullable();
            $table->string('title_font')->nullable();
            $table->string('text_font')->nullable();
            $table->string('tactile_card')->nullable();
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
        Schema::dropIfExists('themes');
    }
}
