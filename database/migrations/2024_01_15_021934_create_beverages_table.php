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
        Schema::create('beverages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->decimal('price', 8, 2); // Specify precision and scale for price
            $table->boolean('published')->default(false);
            $table->boolean('special')->default(false);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id'); // Foreign key to categories table
            $table->softDeletes();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beverages');
    }
};
