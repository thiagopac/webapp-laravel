<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('transaction_id');
            $table->enum('movement', ['outgoing', 'incoming']);
            $table->enum('asset', ['fiat', 'crypto', 'energy']);
            $table->integer('value');
            $table->string('txhash')->nullable();
            $table->enum('status', ['locked', 'canceled', 'fail', 'success', 'awaiting-run', 'running'])->default('locked');;
            $table->json('properties')->nullable();
            $table->json('result')->nullable();
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
        Schema::dropIfExists('exchange_events');
    }
}
