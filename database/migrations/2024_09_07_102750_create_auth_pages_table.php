<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_pages', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name')->nullable();
            $table->string('ip_name')->nullable();
            $table->string('page_name')->nullable();
            $table->string('page_route')->nullable();
            $table->string('local_host_page_url')->nullable();
            $table->string('domain_page_url')->nullable();
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
        Schema::dropIfExists('auth_pages');
    }
}
