<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIletisimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iletisim', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',150);
            $table->string('ad_soyad',150);
            $table->string('mesaj_baslik',70);
            $table->text('mesaj_detay');

            $table->timestamp('olusturulma_tarihi')->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iletisim');
    }
}
