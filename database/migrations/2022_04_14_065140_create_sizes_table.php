<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('s',[0, 1])->default(1)->comment('0: out of stock, 1: stocking');
            $table->enum('m',[0, 1])->default(1)->comment('0: out of stock, 1: stocking');
            $table->enum('l',[0, 1])->default(1)->comment('0: out of stock, 1: stocking');
            $table->enum('xl',[0, 1])->default(1)->comment('0: out of stock, 1: stocking');
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
        Schema::dropIfExists('sizes');
    }
}
