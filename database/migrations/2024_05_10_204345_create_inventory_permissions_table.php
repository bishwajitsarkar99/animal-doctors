<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('mail_id');
            $table->foreign('mail_id')->references('id')->on('users')->onDelete('cascade');
            //$table->string('inventory_id')->unique();
            $table->unsignedBigInteger('inv_permission_id');
            $table->foreign('inv_permission_id')->references('inventory_id')->on('inventories')->onDelete('cascade');
            $table->longText('issue_name');
            $table->boolean('permission_status')->nullable();
            $table->unsignedBigInteger('approved_by')->default(1);
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
        Schema::dropIfExists('inventory_permissions');
    }
}
