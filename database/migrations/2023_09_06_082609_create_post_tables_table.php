<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('post_title');
            $table->string('slug');
            $table->string('category_name');
            $table->string('sub_category_name');
            $table->mediumText('description');
            $table->string('yt_iframe')->nullable();
            $table->string('meta_title');
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('navbar_status')->default('0');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('post_tables');
    }
}
