<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('title', 255)->unique();
            $table->text('description');
            $table->string('short_description', 150)->nullable();
            $table->string('SKU', 35)->nullable();
            $table->float('price')->startingValue(1);
            $table->integer('discount')->nullable()->comment('Discount in %');
            $table->unsignedInteger('in_stock')->default(0);
            $table->string('thumbnail');
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
};
