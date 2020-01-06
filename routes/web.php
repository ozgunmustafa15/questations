<?php
Route::group(['prefix'=>'yonetim','namespace'=>'Yonetim'],function (){

    Route::redirect('/','/yonetim/oturumac');
    Route::get('/oturumukapat', 'KullaniciController@oturumukapat')->name('yonetim.oturumukapat');
    Route::match(['get', 'post'], '/oturumac', 'KullaniciController@oturumac')->name('yonetim.oturumac');

    Route::group(['middleware' => 'yonetim'],function() {
        Route::get('/anasayfa', 'AnasayfaController@index')->name('yonetim.anasayfa');
        Route::group(['prefix'=>'kullanici'],function (){
           Route::match(['get','post'],'/','KullaniciController@index')->name('yonetim.kullanici');
           Route::get('/olustur','KullaniciController@form')->name('yonetim.kullanici.olustur');
           Route::get('/duzenle/{id}','KullaniciController@form')->name('yonetim.kullanici.duzenle');
           Route::post('/kaydet/{id?}','KullaniciController@kaydet')->name('yonetim.kullanici.kaydet');
           Route::get('/sil/{id}','KullaniciController@sil')->name('yonetim.kullanici.sil');
        });
        Route::group(['prefix'=>'oda'],function (){
            Route::match(['get','post'],'/','OdaController@index')->name('yonetim.oda');
            //Route::get('/create','OdaController@form')->name('yonetim.oda.yeni');
            Route::get('/olustur','OdaController@form')->name('yonetim.oda.olustur');
            Route::get('/duzenle/{id}','OdaController@form')->name('yonetim.oda.duzenle');
            Route::post('/kaydet/{id?}','OdaController@kaydet')->name('yonetim.oda.kaydet');
            Route::get('/sil/{id}','OdaController@sil')->name('yonetim.oda.sil');

        });

        Route::get('/mesajlar','IletisimController@listele')->name('yonetim.mesajlar');




    });
});


Route::get('/','AnasayfaController@index')->name('anasayfa');


Route::get('/giris','KullaniciController@giris_form')->name('kullanici.girisyap');
Route::post('/giris','KullaniciController@giris');
Route::get('/kayit','KullaniciController@kaydol_form')->name('kullanici.kayitol');
Route::post('/kayit','KullaniciController@kayitol')->name('kullanici.kayitol');
Route::post('/kullanici/aktivasyon/{anahtar}','KullaniciController@aktivasyon')->name('kullanici.aktivasyon');



Route::get('/iletisim','IletisimController@iletisim_form')->name('iletisim');
Route::post('/iletisim','IletisimController@iletisim');



//giriş yapanların erişebileceği sayfalar
Route::group(['middleware'=>'auth'],function(){
    Route::get('/nav-menu','NavmenuController@index')->name('nav-menu');
    Route::post('/oda/olustur','OdaController@olusturOda')->name('oda_olustur');
    Route::get('/ajax/oda/sorular/{oda_kod}','OdaController@ajaxSorular')->name('sorular-ajax');
    
    
    Route::get('/oda/{oda_kod}','OdaController@oda_sayfasi')->name('oda.oda_sayfasi');
    Route::post('/oda/ara','OdaController@ara')->name('oda_ara');
    Route::post('/oda/soruolustur','OdaController@soruolustur')->name('oda.soruolustur');
    Route::get('/oda/kapat/{oda_kod}','OdaController@oda_kapat')->name('oda.kapat');
    Route::get('/oda/cik/{oda_kod}','OdaController@oda_cik')->name('oda.cik');
    Route::get('/soru/onayla/{soru_id}/{durum}','OdaController@onayla')->name('soru.onayla');
    Route::post('/kullanici/oturumukapat','KullaniciController@oturumukapat')->name('kullanici.oturumukapat');
    Route::get('/{kullanici_adi}','KullaniciController@kullanici_sayfasi')->name('kullanici_sayfasi');
    Route::get('/guncelle/{kullanici_adi}','KullaniciController@guncelle_form')->name('kullanici.guncelle_form');
    Route::post('/guncelle/{kullanici_adi}','KullaniciController@guncelle')->name('kullanici.guncelle');
    Route::post('/ara','KullaniciController@ara')->name('kullanici.ara');
    Route::get('/resmikaldir/{kullanici_adi}','KullaniciController@resmi_kaldir')->name('kullanici.resmi_kaldir');
    
});

Route::get('/test/mail',function (){
    $kullanici=\App\Model\Kullanici::find(Auth::user()->id);
    return new App\Mail\KullaniciKayitMail($kullanici);

});
