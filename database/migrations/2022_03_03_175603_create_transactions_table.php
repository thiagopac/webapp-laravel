<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['Operation - Energy to Crypto', 'Operation - Fiat to Crypto', 'Operation - Crypto to Fiat', 'Operation - Withdraw Fiat', 'Bill - Pay']);
            $table->enum('status', [ 'awaiting-approval', 'ready-to-process', 'processing', 'failed', 'completed', 'disapproved']);
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
        Schema::dropIfExists('transactions');
    }
}
