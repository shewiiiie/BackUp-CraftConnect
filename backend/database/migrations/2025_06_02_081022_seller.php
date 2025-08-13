<?php

// Migration for Seller Profiles: create_seller_profiles_table
// Run: php artisan make:migration create_seller_profiles_table
// Then, update the generated migration file:

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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id('sellerID'); // Primary key for sellers table
            $table->foreignId('user_id')->constrained('users', 'userID')->onDelete('cascade'); // Foreign key to users table
            // Note: sellerEmail and sellerPassword are typically handled by the 'users' table.
            $table->string(column:'website')->nullable();
            $table->string(column:'story')->nullable();
            $table->string(column:'bio')->nullable();
            $table->string(column:'businessName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};