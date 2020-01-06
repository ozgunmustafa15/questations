<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iletisim extends Model
{
    protected $table="iletisim";

    protected $guarded=[];
    public $timestamps = false;

    const CREATED_AT = 'olusturulma_tarihi';



}
