<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleImageProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_image_product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained()->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('product_variant_id')->nullable()->constrained()->references('id')->on('product_variants');
            $table->string('file_path')->nullable();
            $table->boolean('main_image')->nullable();
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
        Schema::dropIfExists('multiple_image_product_variants');
    }
}
