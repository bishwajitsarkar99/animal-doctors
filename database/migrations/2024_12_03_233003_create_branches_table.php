<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('branch_type');
            $table->string('branch_name');
            $table->string('division_name');
            $table->string('district_name');
            $table->string('upazila_name');
            $table->string('town_name');
            $table->string('location');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id')->on('roles')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('emails_id');
            $table->foreign('emails_id')->on('users')->references('id')->onDelete('cascade');
            $table->unique(['emails_id']);
            $table->string('user_name');
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('access_status')->default('0');
            $table->integer('created_by');
            $table->integer('approved_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('branches');
    }
}
