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
            $table->id('product_id');
            $table->string('productName');
            $table->string('productDescription')->nullable();
            $table->decimal('productPrice', 10, 2);
            $table->unsignedInteger('productQuantity')->default(0);
            $table->enum('status', ['in stock', 'low stock', 'out of stock'])->default('in stock');
            $table->foreignId('seller_id')->constrained('sellers', 'sellerID')->onDelete('cascade');
            $table->string('productImage')->nullable();
            $table->string('productVideo')->nullable();
            $table->string('category')->nullable();
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
