<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_emails', function (Blueprint $table) {
            $table->id();
            $table->string('user_to');
            $table->string('user_cc')->nullable();
            $table->string('user_bcc')->nullable();
            $table->string('subject');
            $table->longText('main_content')->nullable();
            $table->longText('email_attachments')->nullable();
            $table->string('attachment_type')->default('other');
            $table->string('sender_email');
            $table->integer('sender_user');
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('read_mail')->default('0');
            $table->tinyInteger('unread_mail')->default('1');
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
        Schema::dropIfExists('user_emails');
    }
}
