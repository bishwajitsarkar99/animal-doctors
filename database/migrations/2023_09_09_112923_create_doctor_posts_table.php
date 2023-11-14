<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('post_title');
            $table->string('slug');
            $table->string('category_name');
            $table->string('sub_category_name');
            $table->string('group_name');
            $table->string('medicine_name');
            $table->string('medicine_dogs');
            $table->string('origin_name');
            $table->string('units_name');
            $table->mediumText('description');
            $table->string('image')->nullable();
            $table->tinyInteger('doctor_status')->default('0');
            $table->tinyInteger('permission_status')->default('0');
            $table->integer('created_by');
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
        Schema::dropIfExists('doctor_posts');
    }
}
