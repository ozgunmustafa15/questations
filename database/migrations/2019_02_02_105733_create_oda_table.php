<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oda', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('olusturan_kullanici_id')->unsigned();
            $table->string('oda_kod',8)->unique();
            $table->text('oda_aciklama')->nullable();
            $table->string('oda_konum');
            $table->boolean('aktif_mi')->default(1);
            $table->timestamp('olusturulma_tarihi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncelleme_tarihi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes('silinme_tarihi');

            //$table->timestamps('silinme_tarihi')->nullable();

            $table->foreign('olusturan_kullanici_id')->references('id')->on('kullanici')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oda');
    }
}
