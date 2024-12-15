<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBranchAccessPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_branch_access_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('branch_type');
            $table->string('branch_name');
            // Foreign Keys for Divisions
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            // Foreign Keys for District
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            // Foreign Keys for Upazila
            $table->unsignedBigInteger('upazila_id');
            $table->foreign('upazila_id')->references('id')->on('thana_or_upazilas')->onDelete('cascade');
            $table->string('town_name');
            $table->string('location');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            // Foreign Keys for Roles
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            // Foreign Keys for Users
            $table->unsignedBigInteger('email_id')->unique();
            $table->foreign('email_id')->references('id')->on('users')->onDelete('cascade');
            // Approval Status
            $table->tinyInteger('admin_approval_status')->default(0);
            $table->tinyInteger('super_admin_approval_status')->default(0);
            $table->tinyInteger('change_status')->default(0);
            $table->tinyInteger('status')->default(0);
            // Approval Metadata
            $table->integer('approver_by')->nullable();
            $table->date('admin_approver_date')->nullable();
            $table->date('super_admin_approver_date')->nullable();
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
        Schema::dropIfExists('user_branch_access_permissions');
    }
}
