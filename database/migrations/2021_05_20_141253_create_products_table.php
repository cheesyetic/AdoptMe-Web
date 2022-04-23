<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->char('IDProduct', 8);
            $table->string('ProductName', 30);
            $table->float('ProductPrice');
            $table->integer('ProductStock');
            $table->string('ProductPicture');
            $table->string('ProductDescription');
            $table->string('TransactionStatus', 10);
            $table->integer('SellingQty');
            $table->integer('LikeQty');
            $table->integer('ReviewQty');
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
