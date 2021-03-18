<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('send_currency');
            $table->string('received_currency');
            $table->string('send_amount');
            $table->string('received_amount');
            $table->string('send_method');
            $table->string('received_method');
            $table->string('send_method_id');
            $table->string('received_method_id');
            $table->string('admin_received_id');
            $table->string('exchange_id');
            $table->string('fee');
            $table->longText('review');
            $table->string('client_status');
            $table->string('admin_status');
            $table->string('status');
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
        Schema::dropIfExists('exchanges');
    }
}
