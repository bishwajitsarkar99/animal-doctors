<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('id_name')->unique();
            $table->string('type');
            $table->string('bussiness_type');
            $table->string('name',200);
            $table->mediumText('office_address');
            $table->mediumText('current_address');
            $table->string('contact_number_one')->unique();
            $table->string('contact_number_two')->nullable()->unique();
            $table->string('whatsapp_number')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->tinyInteger('supplier_status')->default('1');
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
        Schema::dropIfExists('suppliers');
    }
}
