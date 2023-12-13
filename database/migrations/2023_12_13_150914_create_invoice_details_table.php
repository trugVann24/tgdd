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
            $table->unsignedBigInteger('bill_code');
            $table->foreign('bill_code')->references('id')->on('bills')->onDelete('cascade');

            $table->unsignedBigInteger('productStore_id');
            $table->foreign('productStore_id')->references('id')->on('product_stores')->onDelete('cascade');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->double('price');
            $table->integer('quantity')->unsigned;
            $table->string('discount', '255');
            $table->double('total_money');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
