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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('supplilers')->onDelete('cascade');
            $table->string('name');
            $table->double('import_price');
            $table->double('sell_price');
            $table->integer('quantity_instock');
            $table->string('image');
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamps();
           
        });
    }
// mã danh mục, mã nhà cung cấp, tên, số lượng , giá, hình ảnh , mô tả, status

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
