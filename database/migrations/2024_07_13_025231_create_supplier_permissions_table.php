<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_roles_id');
            $table->foreign('user_roles_id')->on('roles')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('user_emails_id');
            $table->foreign('user_emails_id')->on('users')->references('id')->onDelete('cascade');
            $table->unique(['user_emails_id']);
            $table->tinyInteger('create_status')->default('0');
            $table->tinyInteger('update_status')->default('0');
            $table->tinyInteger('delete_status')->default('0');
            $table->tinyInteger('view_status')->default('0');
            $table->tinyInteger('data_export_status')->default('0');
            $table->tinyInteger('data_table_status')->default('0');
            $table->tinyInteger('supplier_requisition_status')->default('0');
            $table->tinyInteger('supplier_payment_status')->default('0');
            $table->tinyInteger('supplier_setting_status')->default('0');
            $table->tinyInteger('supplier_summary_status')->default('0');
            $table->tinyInteger('supplier_searching_status')->default('0');
            $table->unsignedBigInteger('approved_by')->default(1);
            $table->unsignedBigInteger('update_by')->nullable();
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
        Schema::dropIfExists('supplier_permissions');
    }
}
