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
        Schema::create('royalties', function (Blueprint $table) {
            $table->id();
            $table->string('market')->nullable();
            $table->string('isbn')->nullable();
            $table->string('title')->nullable();
            $table->string('author')->nullable();
            $table->string('format')->nullable();
            $table->decimal('list_price', 10, 2)->nullable();
            $table->decimal('wholesale_price', 10, 2)->nullable();
            $table->decimal('agency_price', 10, 2)->nullable();
            $table->decimal('quantity_sold', 10, 2)->nullable();
            $table->decimal('quantity_returns', 10, 2)->nullable();
            $table->decimal('total_gross_sales', 10, 2)->nullable();
            $table->decimal('total_net_sales', 10, 2)->nullable();
            
            $table->timestamps();
            // $table->unique('isbn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('royalties');
    }
};
