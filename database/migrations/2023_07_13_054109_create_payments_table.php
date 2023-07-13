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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained(table: 'users', column: 'id',indexName: 'UsersToPayments')->cascadeOnDelete()->cascadeOnUpdate(); //of payments from users migration
            $table->foreignId('product_id')->constrained(table: 'products', column: 'id',indexName: 'ProductsToPayments')->cascadeOnDelete()->cascadeOnUpdate(); //of payment from product migration
            $table->foreignId('Voucher_id')->constrained(table: 'vouchers', column: 'id',indexName: 'VouchersToPayments')->cascadeOnDelete()->cascadeOnUpdate(); //of payment from voucher migration
            $table->bigInteger('subtotal');
            $table->bigInteger('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
