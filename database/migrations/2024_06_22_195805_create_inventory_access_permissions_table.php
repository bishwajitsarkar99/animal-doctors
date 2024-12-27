<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryAccessPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_access_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id')->on('roles')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('emails_id');
            $table->foreign('emails_id')->on('users')->references('id')->onDelete('cascade');
            $table->unique(['emails_id']);
            $table->tinyInteger('permission_status')->default('0');
            $table->tinyInteger('data_export_status')->default('0');
            $table->string('branch_id')->nullable();
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
        Schema::dropIfExists('inventory_access_permissions');
    }
}
