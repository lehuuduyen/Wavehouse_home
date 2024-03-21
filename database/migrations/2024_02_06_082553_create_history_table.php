<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('amount');
            $table->text('code');
            $table->text('network');
            $table->text('price')->nullable();
            $table->text('total')->nullable();
            $table->text('fee')->nullable();
            $table->text('bank')->nullable();
            $table->text('stk')->nullable();
            $table->text('wallet')->nullable();
            $table->text('sdt');
            $table->text('description')->nullable();
            $table->text('status')->default(1);
            $table->text('status_process')->default(1);
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
        Schema::dropIfExists('history');
    }
}
