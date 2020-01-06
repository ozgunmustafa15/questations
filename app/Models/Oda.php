<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Oda extends Authenticatable
{


    protected $fillable = ['olusturan_kullanici_id', 'oda_kod','oda_konum','oda_aciklama','aktif_mi'];


    //use SoftDeletes;
    protected $table="oda";
    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';


    public function olusturan_kullanici()
    {
        return $this->belongsTo('App\Models\Kullanici');
    }
    public function odadaki_sorular()
    {
        return $this->hasMany('App\Models\Soru');
    }




}
