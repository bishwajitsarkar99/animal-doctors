<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEmailDeletePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_email_delete_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_roles_id');
            $table->foreign('user_roles_id')->on('roles')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('user_emails_id');
            $table->foreign('user_emails_id')->on('users')->references('id')->onDelete('cascade');
            $table->unique(['user_emails_id']);
            $table->tinyInteger('report_status')->default('0');
            $table->tinyInteger('message_status')->default('0');
            $table->tinyInteger('darft_status')->default('0');
            $table->tinyInteger('other_status')->default('0');
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
        Schema::dropIfExists('user_email_delete_permissions');
    }
}
