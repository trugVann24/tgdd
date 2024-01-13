<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productStore_id');
            $table->foreign('productStore_id')->references('id')->on('products')->onDelete('cascade');
            $table->double('price');
            $table->unsignedInteger('quantity');
            $table->text('description')->nullable;
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
};
