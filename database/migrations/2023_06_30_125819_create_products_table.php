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
            $table->string('name');
            $table->string('details');
            $table->foreignId('vendors_id')->constrained(table: 'vendors', column: 'id',indexName: 'VendorsToProducts')->cascadeOnDelete()->cascadeOnUpdate(); //from vendors migration
            $table->text('description');
            $table->string('product');
            $table->string('image')->default('Images/SERV.png');
            $table->unsignedBigInteger('price');
            $table->string('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
