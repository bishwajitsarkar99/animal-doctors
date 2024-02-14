<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForntEndFooterInformationsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornt_end_footer_informations_pages', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('email')->unique();
            $table->string('contract_number_one');
            $table->string('contract_number_two');
            $table->string('hot_number');
            $table->string('whatsapp_number_one');
            $table->string('whatsapp_number_two');
            $table->string('facebook_address');
            $table->string('linkedin');
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
        Schema::dropIfExists('fornt_end_footer_informations_pages');
    }
}
