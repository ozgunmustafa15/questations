<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdaKatilanlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oda_katilanlar', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('oda_id')->unsigned();
            $table->integer('kullanici_id')->unsigned();

            $table->foreign('oda_id')->references('id')->on('oda')->onDelete('cascade');
            $table->foreign('kullanici_id')->references('id')->on('kullanici')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oda_katilanlar');
    }
}
