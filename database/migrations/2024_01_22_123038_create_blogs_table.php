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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('added_by')->constrained('admins')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('blog_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('desc');
            $table->string('seo_title')->nullable();
            $table->string('seo_desc')->nullable();
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
