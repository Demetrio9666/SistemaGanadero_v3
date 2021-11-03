<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAnimaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_animale', function (Blueprint $table) {
            $table->id();
            $table->string('animalCode')->unique();
            $table->string('url');
            $table->date('date');
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('race_id')->references('id')->on('race')
                            ->onDelete('set null')
                            ->onUpdate('cascade');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->foreign('set null')->references('id')->on('stage')
                           ->onDelete('cascade')->onUpdate('cascade');
            $table->string('source',20);
            $table->string('health_condition',20);
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('location')
                            ->onDelete('set null')
                            ->onUpdate('cascade');     
            $table->string('conceived',25);
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->foreign('mother_id')->references('id')->on('mother')
                            ->onDelete('set null')
                            ->onUpdate('cascade');
            $table->unsignedBigInteger('father_id')->nullable();
            $table->foreign('father_id')->references('id')->on('father')
                            ->onDelete('set null')
                            ->onUpdate('cascade');

            $table->unsignedBigInteger('actual_state_animal_id')->nullable();
            $table->foreign('actual_state_animal_id')->references('id')->on('actual_state_animal')
                            ->onDelete('set null')
                            ->onUpdate('cascade');
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
        Schema::dropIfExists('file_animale');
    }
}
