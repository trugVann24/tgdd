<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('staff_code')->primary();
            $table->string('name');
            $table->text('address');
            $table->date('day_in_work');
            $table->unsignedBigInteger('phone_number');
            $table->boolean('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
