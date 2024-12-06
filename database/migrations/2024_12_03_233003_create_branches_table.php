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
            $table->string('branch_name')->unique();
            $table->string('division_id');
            $table->string('district_id');
            $table->string('upazila_id');
            $table->string('town_name');
            $table->string('location');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('approval_status')->default('0');
            $table->integer('approver_by')->nullable();
            $table->string('approver_date')->nullable();
            
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
