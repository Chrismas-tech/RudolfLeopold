<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionPivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option_pivots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->references('id')->on('products')->onDelete('cascade');;
            $table->foreignId('product_option_id')->constrained()->references('id')->on('product_options');
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
        Schema::dropIfExists('product_option_pivots');
    }
}
