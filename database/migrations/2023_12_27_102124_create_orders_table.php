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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('product_qty');
            $table->double('subtotal');
            $table->double('discount')->default(0);
            $table->unsignedBigInteger('address_id');
            $table->double('delivery_charge')->default(0);
            $table->double('grand_total');
            $table->text('address');
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('pending');
            $table->date('payment_approve_date')->nullable();
            $table->string('order_status')->default('pending');
            $table->string('invoice_id');
            $table->json('coupon_info')->nullable();
            $table->string('currency_name')->nullable();
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
