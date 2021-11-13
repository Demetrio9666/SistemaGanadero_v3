<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('location_d');
            $table->string('description');
            $table->unsignedBigInteger('branch_office_id');
            $table->foreign('branch_office_id')->references('id')->on('branch_office')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
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
        Schema::dropIfExists('location');
    }
}
