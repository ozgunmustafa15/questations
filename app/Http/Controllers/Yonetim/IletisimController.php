<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Iletisim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IletisimController extends Controller
{
    public function listele(){

        $liste=Iletisim::all();
        //$liste=Iletisim::orderBy('olusturulma_tarihi','desc');
        return view('yonetim.iletisim.mesajlar',compact('liste'));
    }
}
