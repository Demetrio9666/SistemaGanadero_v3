<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDewormingControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deworming_control', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table-> unsignedBigInteger('animalCode_id');
            $table->foreign('animalCode_id')->references('id')->on('file_animale')
                  ->onDelete('cascade')->onUpdate('cascade');
                  
            $table-> unsignedBigInteger('deworming_id')->nullable();;
            $table->foreign('deworming_id')->references('id')->on('dewormer')
            ->onDelete('set null')->onUpdate('cascade');
            $table->date('date_r');
            $table-> unsignedBigInteger('actual_state_infor_id')->nullable();
            $table->foreign('actual_state_infor_id')->references('id')->on('actual_state_infor')
                    ->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('deworming_control');
    }
}
