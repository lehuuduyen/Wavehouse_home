<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportExportCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_export_coupon', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name')->max(128);
            $table->string('code')->max(40);
            $table->integer('price');
            $table->integer('supplier_id')->max(8);
            $table->integer('warehouse_id')->max(8);
            $table->tinyInteger('status');
            $table->integer('user_id')->max(8);
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
        Schema::dropIfExists('import_export_coupon');
    }
}
