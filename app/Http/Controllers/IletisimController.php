<?php

namespace App\Http\Controllers;

use App\Models\Iletisim;
use Illuminate\Http\Request;

class IletisimController extends Controller
{
    public function iletisim_form()
    {
        return view('iletisim');
    }
    public function iletisim()
    {

        $this->validate(request(),[
            'email'         =>'required' ,
            'mesaj_detay'   =>'required'

        ]);

        $iletisim=Iletisim::create([
            'email'         =>request('email'),
            'ad_soyad'         =>request('ad_soyad'),
            'mesaj_baslik'         =>request('mesaj_baslik'),
            'mesaj_detay'         =>request('mesaj_detay')


        ]);

        return redirect()->route('iletisim')
            ->with('mesaj','Bildirimde bulunduğunuz için teşekkür ederiz.')
            ->with('mesaj_tur','info');

    }
}
