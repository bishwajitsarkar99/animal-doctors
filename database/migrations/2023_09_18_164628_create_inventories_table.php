<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id('medicine_group_id');
            $table->string('inv_id');
            $table->string('supplier_id');
            $table->string('category_id');
            $table->string('medicine_group');
            $table->text('medicine_name');
            $table->string('medicine_dogs');
            $table->string('medicine_origin');
            $table->string('medicine_size');
            $table->decimal('price', 8, 2);
            $table->decimal('quantity',5,2)->default(0.00);
            $table->decimal('amount', 8, 2)->default(0.00); // Added amount field with default value 0.00
            $table->decimal('vat_percentage', 5,2)->default(0.00);
            $table->decimal('tax_percentage', 5, 2)->default(0.00); // Added tax_percentage field with default value 0.00
            $table->decimal('discount_percentage', 5, 2)->default(0.00); // Added discount_percentage field with default value 0.00
            $table->decimal('sub_total', 8, 2)->default(0.00); // Added sub_total field with default value 0.00
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('status_inv')->default(1);
            $table->integer('status_stock')->nullable();
            $table->string('stock_id')->nullable();
            $table->date('manufacture_date');
            $table->date('expiry_date');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
