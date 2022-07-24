<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('type');
            $table->foreignId('category_id')->constrained();
            $table->string('category_name');
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('qty')->nullable();
            $table->string('tags')->nullable();
            $table->longText('short_description');
            $table->longText('long_description');
            $table->decimal('weight', 10, 2)->nullable();
            $table->foreignId('weight_id')->constrained()->references('id')->on('weights');
            $table->string('file_path')->nullable();
            $table->string('url')->nullable();
            $table->foreignId('currency_id')->nullable()->constrained()->references('id')->on('currencies');
            $table->unsignedBigInteger('selling_price')->nullable();
            $table->decimal('discount_percent', 10, 2)->nullable();
            $table->boolean('visible')->nullable();
            $table->boolean('variant')->nullable();
            $table->boolean('hot_deals')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('special_offer')->nullable();
            $table->boolean('special_deals')->nullable();
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
        Schema::dropIfExists('products');
    }
}
