<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_categories', function (Blueprint $table) {
            $table->id();
            $table->string('branch_category_name')->unique();
            $table->unsignedBigInteger('creator');
            $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updator')->nullable();
            $table->foreign('updator')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('branch_categories');
    }
}
