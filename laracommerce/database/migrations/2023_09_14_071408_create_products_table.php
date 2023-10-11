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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('name');
            $table->string('slug');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();

            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity')->unsigned();
            $table->enum('trending',[0,1])->default(0)->comment('0=notTrendy , 1=Trendy');
            $table->enum('status',[0,1])->default(0)->comment('0=visible , 1=hidden');

            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            #  a product_images table created to set multiple images for the product
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
