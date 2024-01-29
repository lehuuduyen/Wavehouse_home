<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportExportCouponProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_export_coupon_product', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('product_id')->max(8);
            $table->integer('coupon_id')->max(8);
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('price_old')->default(0);
            $table->integer('wavehouse_id')->max(8);
            $table->tinyInteger('status');
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
