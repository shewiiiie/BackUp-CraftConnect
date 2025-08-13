 <?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('orderItemID');
            $table->foreignId('order_id')->constrained('orders', 'orderID')->onDelete('cascade'); // Foreign key to orders table
            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('cascade'); // Foreign key to products table (assuming you'll have one)
            $table->integer('quantity');
            $table->decimal('price', 8, 2); // Price at the time of purchase
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
}; 
