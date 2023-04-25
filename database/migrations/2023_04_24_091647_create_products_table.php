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
            $table->timestamps();
            $table->string("name", 100)->nullable(false);
            $table->text("description")->nullable(false);;
            $table->float("price")->nullable(false);;
            $table->string("image")->nullable(false);;
            $table->enum("published", ["publié", "non publié"])->nullable(false);;
            $table->enum("state", ["solde", "standard"])->nullable(false);;
            $table->string("reference", 16)->nullable(false)->unique();

            $table->foreignId("categories_id")->nullable(false)->constrained()->onUpdate("cascade")->onDelete("cascade");
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
