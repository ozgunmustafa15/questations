<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soru', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('oda_id')->unsigned();
            $table->integer('kullanici_id')->unsigned();
            $table->string('soru_detay');
            $table->boolean('aktif_mi')->default(0);
            $table->timestamp('olusturulma_tarihi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncelleme_tarihi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes('silinme_tarihi');



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
        Schema::dropIfExists('soru');
    }
}
