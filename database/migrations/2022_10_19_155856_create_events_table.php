<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamp('start_registry')->nullable();
            $table->timestamp('end_registry')->nullable();
            $table->unsignedMediumInteger('off')->nullable();
            $table->enum('off_type', ['percent', 'value'])->nullable();
            $table->string('tags')->nullable();
            $table->string('facilities')->nullable();
            $table->longText('description');
            $table->longText('ticket_description')->nullable();
            $table->longText('age_description')->nullable();
            $table->longText('level_description')->nullable();
            $table->boolean('status')->default(false);
            $table->unsignedFloat('rate')->nullable();
            $table->unsignedMediumInteger('rate_count')->default(0);
            $table->unsignedMediumInteger('comment_count')->default(0);
            $table->unsignedMediumInteger('new_comment_count')->default(0);
            $table->unsignedMediumInteger('capacity')->nullable();
            $table->unsignedMediumInteger('price');
            $table->string('address');
            $table->string('email');
            $table->string('site');
            $table->string('phone');
            $table->float('x');
            $table->float('y');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('launcher_id');
            $table->index('launcher_id');
            $table->index('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('launcher_id')->references('id')->on('launchers');
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
        Schema::connection('mysql2')->dropIfExists('events');
    }
}
