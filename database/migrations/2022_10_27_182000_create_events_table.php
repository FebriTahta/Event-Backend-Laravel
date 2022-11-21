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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
           
            $table->string('event_name')->nullable();
            $table->string('event_slug')->nullable();
            $table->string('event_url')->nullable();
            $table->string('event_link')->nullable();
            $table->string('event_deadline')->nullable();
            $table->string('event_source')->nullable();
            $table->string('event_rank')->nullable();
            $table->string('event_cost')->nullable();
            $table->string('event_image')->nullable();
            $table->string('event_thumb')->nullable();
            $table->longText('event_desc')->nullable();
            $table->string('event_key')->nullable();
            $table->string('event_stat')->nullable();
            $table->string('event_view')->nullable();
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
        Schema::dropIfExists('events');
    }
};
