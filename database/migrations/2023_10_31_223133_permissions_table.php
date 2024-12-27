<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->on('roles')->references('id')->onDelete('cascade');

            // $table->unsignedBigInteger('branch_id');
            // $table->foreign('branch_id')->on('users')->references('id')->onDelete('cascade');
            // $table->unsignedBigInteger('branch_type');
            // $table->foreign('branch_type')->on('branch_categories')->references('id')->onDelete('cascade');
            // $table->string('branch_name');
            // $table->unsignedBigInteger('role_id');
            // $table->foreign('role_id')->on('roles')->references('id')->onDelete('cascade');
            // $table->unsignedBigInteger('email_id');
            // $table->foreign('email_id')->on('users')->references('id')->onDelete('cascade');
            // $table->unsignedBigInteger('module_name_id');
            // $table->foreign('module_name_id')->on('modules')->references('id')->onDelete('cascade');
            // table->unsignedBigInteger('module_category_id');
            // $table->foreign('module_category_id')->on('module_categories')->references('id')->onDelete('cascade');
            // $table->string('route_url');
            // $table->string('route_name');
            // $table->tinyInteger('permission_status')->default('0');
            // $table->tinyInteger('approver_status')->nullable();
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
        Schema::dropIfExists('permissions');
    }
}
