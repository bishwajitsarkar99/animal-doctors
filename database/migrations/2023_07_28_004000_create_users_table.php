<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id')->nullable();
            $table->string('branch_type')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('division_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('upazila_name')->nullable();
            $table->string('town_name')->nullable();
            $table->string('location')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('contract_number');
            $table->string('image',155);
            $table->tinyInteger('status')->default('1');
            $table->rememberToken();
            $table->string('reference_email');
            $table->string('login_email');
            $table->string('mailing_email');
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
        Schema::dropIfExists('users');
    }
}
