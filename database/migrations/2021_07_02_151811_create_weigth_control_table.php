<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeigthControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weigth_control', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table-> unsignedBigInteger('animalCode_id');
            $table->foreign('animalCode_id')->references('id')->on('file_animale')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->float('weigtht');
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
        Schema::dropIfExists('weigth_control');
    }
}
