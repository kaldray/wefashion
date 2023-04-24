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
        Schema::create('size', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId("product_id")->constrained();
            $table->enum("sizes", ["XS,S,M,L,XL"]);
            $table->primary(['product_id', "sizes"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size');
    }
};
