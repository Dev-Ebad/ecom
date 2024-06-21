<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_table', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->integer('SKU')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('images')->nullable();
            $table->string('attributes')->nullable();
            $table->integer('status')->nullable();
            $table->string('featured')->nullable();
            $table->integer('rating')->nullable();
            $table->string('reviews')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_table');
    }
}
