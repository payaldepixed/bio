<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPageDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_page_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('theme')->nullable();
            $table->string('primary_text_color')->nullable();
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
            $table->string('enable_vcard')->default(0)->nullable();
            $table->string('enable_share_button')->default(0)->nullable();
            $table->string('click_qr_code')->default(0)->nullable();
            $table->string('hide_link_binding')->default(0)->nullable();
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
        Schema::dropIfExists('user_page_designs');
    }
}
