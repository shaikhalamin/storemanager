<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('image');
            $table->string('productname');
            $table->string('productcode');
            $table->string('productunit')->nullable();
            $table->text('description')->nullable();
            $table->double('purchaseprice', 8, 2)->nullable();
            $table->double('bodyrate', 8, 2)->nullable();
            $table->double('salesprice', 8, 2)->nullable();
            $table->double('discount', 8, 2)->nullable();
            $table->string('totalstock')->nullable();
            $table->boolean('availability')->default(1);
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->default(1);
            $table->integer('supplier_id')->nullable();
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
