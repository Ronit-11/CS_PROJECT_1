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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained(table: 'users', column: 'id',indexName: 'UsersToVendors')->cascadeOnDelete()->cascadeOnUpdate(); //of vendor from users migration
            $table->string('Shop_name');
            $table->string('address');
            $table->bigInteger('telephone')->unique();
            $table->string('kra_pin');
            $table->string('business_permit_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
