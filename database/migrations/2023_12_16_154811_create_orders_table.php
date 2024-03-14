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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->longText('address');
            $table->string('city');
            $table->string('mobile');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('shipping');
            $table->longText('sub_total');
            $table->longText('order_notes')->nullable();
            $table->enum('delivery_type',['cash_on_delivery','card'])->default('cash_on_delivery');
            $table->enum('status',['pending','processing','on_the_way','delivery','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
