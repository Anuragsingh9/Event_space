<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_spaces', function (Blueprint $table) {
            $table->uuid('space_uuid');
            $table->string('space_name');
            $table->string('space_short_name');
            $table->string('space_mood');
            $table->integer('max_capacity');
            $table->string('space_image_url');
            $table->string('space_icon_url');
            $table->integer('is_vip_space');
            $table->json('opening_hours');
            $table->integer('event_id');
            $table->string('tags');

            

            
            



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
        Schema::dropIfExists('event_spaces');
    }
}
