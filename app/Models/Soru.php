<?php

namespace App\Models;
use App\Models\Kullanici;
use App\Models\Oda;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Soru extends Model
{
    use SoftDeletes;
    protected $table="soru";

    protected $fillable = ['oda_id', 'kullanici_id', 'soru_detay', 'aktif_mi'];
    protected $hidden = ['aktif_mi'];


    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    public function kullanici()
    {
        return $this->belongsTo('App\Models\Kullanici');
    }

    public function oda()
    {
        return $this->belongsTo('App\Models\Oda');

    }

}
