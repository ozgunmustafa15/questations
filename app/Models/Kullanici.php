<?php

namespace App\Models;
use App\Oda;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable
{


    protected $table="kullanici";


    protected $fillable = [
        'email', 'kullanici_adi', 'ad_soyad','sifre','aktivasyon_anahtari','aktif_mi','yonetici_mi','profil_resmi'
    ];


    protected $hidden = ['sifre', 'aktivasyon_anahtari'];

    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT=   'silinme_tarihi';
    //use SoftDeletes;

    public function getAuthPassword()
    {
        //veri tabanında password varsayılan olarak tuttuğu password alanını sifre adıyla değerlendirmesini sağladık.
        return $this->sifre;
    }

    public function odalar()
    {
        return $this->hasMany('App\Oda');
    }

    public function detay()
    {
        return $this->hasOne('App\Models\KullaniciDetay')->withDefault();
    }
}
