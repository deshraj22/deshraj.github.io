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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->string('userEMAIL');
            $table->string('productID');
            $table->string('no_of_product')->default('1');
            $table->string('name');
            $table->longText('description');
            $table->string('image');
            $table->integer('price');
            $table->integer('Total_no_of_product');
            $table->integer('sold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
