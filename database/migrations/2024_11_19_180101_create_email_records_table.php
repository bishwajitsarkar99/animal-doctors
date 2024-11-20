<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_records', function (Blueprint $table) {
            $table->id();
            $table->string('user_to')->nullable();
            $table->string('user_cc')->nullable();
            $table->string('user_bcc')->nullable();
            $table->string('subject')->nullable();
            $table->longText('main_content')->nullable();
            $table->longText('email_attachments')->nullable();
            $table->string('attachment_type')->default('other');
            $table->string('sender_email');
            $table->integer('sender_user');
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('read_mail')->nullable();
            $table->tinyInteger('draft_mail')->nullable();
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
        Schema::dropIfExists('email_records');
    }
}
