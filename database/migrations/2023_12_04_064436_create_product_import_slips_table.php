<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_import_slips', function (Blueprint $table) {
            $table->string("product_import_slip_id")->primary();

            $table->string('product_id');
            $table->foreign('product_id')->references('product_id')->on('product');

            $table->string('product_supplier_id');
            $table->foreign('product_supplier_id')->references('product_supplier_id')->on('supplier_categories');
            
            $table->string('employee_id');
            $table->integer('import_quantity');
            $table->string('total_money_product');
            $table->boolean('status');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_import_slips');
    }
};
