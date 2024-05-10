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

            $table->foreignId('category_id');
            $table->foreignId('sub_category_id');
            $table->foreignId('user_id');

            $table->string('title');
            $table->longText('product_image')->nullable();
            $table->string('slug')->unique();

            $table->longText('description')->nullable();

            $table->float('price', 10, 2);


            $table->boolean('status')->default(true);

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
