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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name')-> nullable();
            $table->string('description')-> nullable();
            $table->string('quantity_received')-> nullable();
            $table->string('quantity_sold')-> nullable();
            $table->string('inventory')-> nullable();
            $table->string('product_id')-> nullable();
            $table->string('order_id')-> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
