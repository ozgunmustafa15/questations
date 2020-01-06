<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKullaniciDetay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanici_detaylar', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('kullanici_id')->unsigned();
            $table->string('profil_resmi',70);

            $table->string('web_adres',150)->nullable();
            $table->string('linkedin_adres',150)->nullable();
            $table->string('youtube_adres',150)->nullable();
            $table->string('instagram_adres',150)->nullable();
            $table->string('facebook_adres',150)->nullable();
            $table->boolean('cinsiyet');
            $table->text('bio');

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
        Schema::dropIfExists('kullanici_detay');
    }
}
