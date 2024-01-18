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
        Schema::create('orderplaced', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->string('name');
            $table->string('productID');
            $table->string('productName');
            $table->string('price');
            $table->string('total_no_of_product');
            $table->string('delivery_address');
            $table->enum('status',['Pending','Deliverd','accepted','declined','Refunded','Out For Delivery'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderplaced');
    }
};
