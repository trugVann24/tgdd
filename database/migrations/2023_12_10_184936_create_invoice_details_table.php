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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('code_bill');
            $table->foreign('code_bill')->references('bill_code')->on('bills')->onDelete('cascade');
            $table->string('productStore_id');
            $table->foreign('productStore_id')->references('productStore_id')->on('product_stores')->onDelete('cascade');
            $table->string('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->double('price');
            $table->unsignedInteger('quantity');
            $table->string('discount');
            $table->double('total_money');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
