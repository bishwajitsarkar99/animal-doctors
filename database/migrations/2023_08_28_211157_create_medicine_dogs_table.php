<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_dogs', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_dogs',200);
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')->references('id')->on('medicine_dogs')->onDelete('cascade');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('medicine_dogs');
    }
}
