<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileReproductionInternalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_reproduction_internal', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table-> unsignedBigInteger('animalCode_id_m');
            $table->foreign('animalCode_id_m')->references('id')->on('file_animale')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table-> unsignedBigInteger('animalCode_id_p');
            $table->foreign('animalCode_id_p')->references('id')->on('file_animale')
                    ->onDelete('cascade')->onUpdate('cascade');
                    
            $table-> unsignedBigInteger('reproduction_state_id')->nullable();
            $table->foreign('reproduction_state_id')->references('id')->on('reproduction_state')
                    ->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('file_reproduction_internal');
    }
}
