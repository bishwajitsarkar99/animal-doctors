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
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upazila_id');
            $table->string('town_name');
            $table->string('location');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();

            // Foreign Keys for Roles
            $table->unsignedBigInteger('admin_role_id')->nullable();
            $table->foreign('admin_role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('sub_admin_role_id')->nullable();
            $table->foreign('sub_admin_role_id')->references('id')->on('roles')->onDelete('cascade');

            // Foreign Keys for Users
            $table->unsignedBigInteger('admin_email_id')->nullable();
            $table->foreign('admin_email_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('sub_admin_email_id')->nullable();
            $table->foreign('sub_admin_email_id')->references('id')->on('users')->onDelete('cascade');

            // Approval Status
            $table->tinyInteger('admin_approval_status')->default(0);
            $table->tinyInteger('sub_admin_approval_status')->default(0);

            // Approval Metadata
            $table->integer('approver_by')->nullable();
            $table->date('admin_approver_date')->nullable();
            $table->date('sub_admin_approver_date')->nullable();
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
