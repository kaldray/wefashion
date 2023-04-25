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
        Schema::create('sizes', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId("product_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->enum("sizes", ["XS", "S", "M", "L", "XL"]);
            $table->primary(['product_id', "sizes"]);
            $table->unsignedMediumInteger("quantity");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
