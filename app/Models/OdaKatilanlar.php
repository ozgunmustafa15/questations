<?php

namespace App\Models;
use App\Models\Oda;
use App\Kullanici;



use Illuminate\Foundation\Auth\User as Authenticatable;

class OdaKatilanlar extends Authenticatable
{
    protected $fillable = ['oda_id', 'kullanici_id'];
    protected $table="oda_katilanlar";
    public $timestamps = false;



    public function kullanici()
    {
        return $this->belongsTo('App\Models\Kullanici');
    }


    public function oda_ait()
    {
        return $this->belongsTo('App\Models\Oda');
    }


}
