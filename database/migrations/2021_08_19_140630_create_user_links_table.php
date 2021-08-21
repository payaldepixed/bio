<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('name')->unique()->nullable();
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });

        Schema::table('user_page_blocks', function (Blueprint $table) {
            $table->foreignId('link_id')->nullable()->index();
        });
        Schema::table('user_page_designs', function (Blueprint $table) {
            $table->foreignId('link_id')->nullable()->index();
        });
        Schema::table('user_page_social_links', function (Blueprint $table) {
            $table->foreignId('link_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_links');
    }
}
