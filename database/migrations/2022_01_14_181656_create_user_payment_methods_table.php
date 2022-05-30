<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('holder'); //owner full name
            $table->integer('iin'); //Issuer Identification Number - first six digits
            $table->integer('last_digits'); //only for user identification
            $table->string('expiration'); //string for unknown expiration date formats
            $table->string('issuer'); //visa, mastercard, american-express, or new brands
            $table->string('type'); //credit, debit or new types
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
        Schema::dropIfExists('user_payment_methods');
    }
}
