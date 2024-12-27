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
            $table->id('inventory_id');
            $table->integer('user_id');
            $table->string('inv_id')->unique();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('medicine_group');
            $table->foreign('medicine_group')->references('id')->on('medicine_groups')->onDelete('cascade');
            $table->unsignedBigInteger('medicine_name');
            $table->foreign('medicine_name')->references('id')->on('medicine_names')->onDelete('cascade');
            $table->unsignedBigInteger('medicine_dosage');
            $table->foreign('medicine_dosage')->references('id')->on('medicine_dogs')->onDelete('cascade');
            $table->unsignedBigInteger('medicine_origin');
            $table->foreign('medicine_origin')->references('id')->on('medicine_origins')->onDelete('cascade');
            $table->unsignedBigInteger('medicine_size');
            $table->foreign('medicine_size')->references('id')->on('units')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->decimal('quantity',5,2)->default(0.00);
            $table->decimal('amount', 8, 2)->default(0.00);
            $table->decimal('vat_percentage', 5,2)->default(0.00);
            $table->decimal('tax_percentage', 5, 2)->default(0.00);
            $table->decimal('discount_percentage', 5, 2)->default(0.00);
            $table->decimal('sub_total', 8, 2)->default(0.00);
            $table->boolean('status')->nullable();
            $table->tinyInteger('status_inv')->default(1);
            $table->date('manufacture_date');
            $table->date('expiry_date');
            $table->integer('updated_by')->nullable();
            $table->string('permission_token')->nullable();
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('inventories');
        
    }
}
