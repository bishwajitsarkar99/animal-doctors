<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleLinkUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_link_urls', function (Blueprint $table) {
            $table->id();
            $table->string('module_url');
            $table->unsignedBigInteger('category_module_id');
            $table->foreign('category_module_id')->references('id')->on('category_modules')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_module_id');
            $table->foreign('sub_category_module_id')->references('id')->on('sub_category_modules')->onDelete('cascade');
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('module_link_urls');
    }
}
