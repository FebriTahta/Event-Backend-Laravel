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
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->string('news_title')->nullable();
            $table->longtext('news_slug')->nullable();
            $table->string('news_url')->nullable();
            $table->string('news_view')->nullable();
            $table->longText('news_desc')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('news_stat')->nullable();
            $table->string('news_views')->nullable();
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
