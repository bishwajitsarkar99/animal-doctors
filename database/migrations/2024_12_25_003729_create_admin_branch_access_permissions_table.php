<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminBranchAccessPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_branch_access_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('branch_type');
            $table->string('branch_name');
            // Foreign Keys for Divisions
            $table->string('division_name');
            // Foreign Keys for District
            $table->string('district_name');
            // Foreign Keys for Upazila
            $table->string('upazila_name');
            $table->string('town_name');
            $table->string('location');

            // Foreign Keys for Roles
            $table->unsignedBigInteger('user_role_id')->nullable();
            $table->foreign('user_role_id')->references('id')->on('roles')->onDelete('cascade');
            // Foreign Keys for Users
            $table->unsignedBigInteger('user_email_id')->unique()->nullable();
            $table->foreign('user_email_id')->references('id')->on('users')->onDelete('cascade');

            // Creator
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            // Updator
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            // Approver
            $table->unsignedBigInteger('approver_by')->nullable();
            $table->foreign('approver_by')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            // $table->dateTime('approver_date')->nullable();
            $table->dateTime('approver_date')->nullable();
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
        Schema::dropIfExists('admin_branch_access_permissions');
    }
}
