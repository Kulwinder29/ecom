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
        Schema::create('product-attribute', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('size_id');
            $table->string('color_id');
            $table->string('mrp');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('product-attribute');
    }
};
