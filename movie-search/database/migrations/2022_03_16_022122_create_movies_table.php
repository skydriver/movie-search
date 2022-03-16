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
        /***************************************************************************
         * DB Structure
         * 
         * Option 1 - polymorphism
         * Option 2 - each movie provider different table
         * 
         * Additional for locales, adding lang as a column or maybe partitions 
         * lang prefixed partitions in extreme cases
         * 
         * http://api.themoviedb.org/3/discover/movie?api_key=e723711a5aae8fdde5be2d8c6c405d81 (response: "total_pages":32720,"total_results":654382)
         * on July 26, 2013 total results 128188
         * *************************************************************************/

        Schema::create('movies', function (Blueprint $table) {
            $table->id();

            // do we need auth system ?
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            
            $table->string('provider');
            $table->bigInteger('video_provider_id');
            $table->string('title');
            $table->string('overview');
            $table->string('trailer_url');
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
        Schema::dropIfExists('movies');
    }
};
