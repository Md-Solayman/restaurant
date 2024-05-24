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
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->string('short_description');
            $table->unsignedBigInteger('category_id');
            $table->text('long_description');
            $table->double('price');
            $table->double('offer_price')->nullable();
            $table->string('sku')->nullable();
            $table->string('slug')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('show_homepage')->default(0);
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
