<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('subject');
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('whiteLogo')->nullable();
            $table->text('blackLogo')->nullable();
            $table->text('icon')->nullable();
            $table->text('bannerImage');
            $table->text('ruleImage');
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
        Schema::dropIfExists('settings');
    }
}
