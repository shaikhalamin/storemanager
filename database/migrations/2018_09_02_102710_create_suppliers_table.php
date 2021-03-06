<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyname');
            $table->string('propitername');
            $table->string('suppliercode')->nullable();
            $table->string('mobile')->unique();
            $table->string('telephone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->double('due', 8, 2)->nullable();
            $table->double('deposit', 8, 2)->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('productssale')->nullable();
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->default('default.jpg');
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
        Schema::dropIfExists('suppliers');
    }
}
