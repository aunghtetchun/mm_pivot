<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('building_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->string('patch');
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
        Schema::dropIfExists('project_photos');
    }
}
