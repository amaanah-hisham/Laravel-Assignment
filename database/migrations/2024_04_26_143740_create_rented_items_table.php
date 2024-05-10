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
        Schema::create('rented_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('renter_id');
            $table->foreignId('rentee_id');
            $table->foreignId('product_id');
            $table->text('message')->nullable();
            $table->date('renting_date');
            $table->date('returning_date');
            $table->json('rented_metadata')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rented_items');
    }
};
