<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_stores', function (Blueprint $table) {
            $table->string('productStore_id')->primary();
            $table->string('productStore_name');
            $table->double('price');
            $table->unsignedInteger('quantity');
            $table->text('description');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_stores');
    }
};
