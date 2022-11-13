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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('news_title')->nullable();
            $table->longtext('news_slug')->nullable();
            $table->string('news_url')->nullable();
            $table->string('news_view')->nullable();
            $table->longText('news_desc')->nullable();
            $table->string('news_image')->nullable();
            $table->string('news_thumb')->nullable();
            $table->string('news_stat')->nullable();
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
        Schema::dropIfExists('news');
    }
};
