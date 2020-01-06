<?php

namespace App\Http\Controllers;

use App\Models\Kullanici;
use App\Models\OdaKatilanlar;
use App\Models\Soru;
use App\Oda;
use Illuminate\Http\Request;

class OdaController extends Controller
{
    public function katilan()
    {

        return view('oda.katilan');
    }
    public function olusturan()
    {
        return view('oda.olusturan');

    }

    public function index()
    {

    }


    public function olusturOda()
    {

        $this->validate(request(),[
            'oda_kod'=>'required|unique:oda' ,
            'oda_aciklama'      =>'required'
        ]);

        $oda=Oda::create([
            'olusturan_kullanici_id' => auth()->id(),
            'oda_kod'         =>request('oda_kod'),
            'oda_aciklama'    =>request('oda_aciklama'),
            'oda_konum'       =>request('oda_konum'),
            'aktif_mi'       =>1
        ]);

        return redirect()->route('oda.oda_sayfasi', ['oda_kod'=> request('oda_kod')]);

    }

    public function soruolustur()
    {
        $oda = Oda::find(request('oda_id'));

        $aktif_mi = auth()->id() == $oda->olusturan_kullanici_id ? 1 : 0;

        $soru=Soru::create([
            'kullanici_id' => auth()->id(),
            'oda_id'         => request('oda_id'),
            'soru_detay'    =>request('soru_detay'),
            'aktif_mi'       =>  $aktif_mi
        ]);

        return response()->json(['islem'=>'basarili']);
    }

    public function oda_sayfasi($oda_kod)
    {
        $oda=Oda::where('oda_kod',$oda_kod)->where('aktif_mi', 1)->firstOrFail();

        $sorular = Soru::where('oda_id', $oda->id)->orderBy('olusturulma_tarihi', 'desc')->get();

        OdaKatilanlar::updateOrCreate([
            'kullanici_id' => auth()->id(),
            'oda_id'         => $oda->id
        ]);

        $katilanlar = OdaKatilanlar::where('oda_id', $oda->id)->get();
        $katilan_sayisi = OdaKatilanlar::where('oda_id', $oda->id)->count();



        return view('oda.oda_sayfasi',compact('oda', 'sorular', 'katilanlar','katilan_sayisi'));
    }

    public function sorular($oda_kod)
    {
        $oda=Oda::where('oda_kod',$oda_kod)->where('aktif_mi', 1)->firstOrFail();

        $sorular = Soru::where('oda_id', $oda->id)->orderBy('olusturulma_tarihi', 'desc')->get();

        OdaKatilanlar::updateOrCreate([
            'kullanici_id' => auth()->id(),
            'oda_id'         => $oda->id
        ]);

        $katilanlar = OdaKatilanlar::where('oda_id', $oda->id)->get();
        $katilan_sayisi = OdaKatilanlar::where('oda_id', $oda->id)->count();


        view()->composer(['oda.oda_sayfasi', 'oda.sorular'], function($view){
            $view->with('oda')
                ->with('sorular')
                ->with('katilanlar')
                ->with('katilan_sayisi')
            ;
        });

        view()->share('oda.sorular',compact('oda', 'sorular', 'katilanlar','katilan_sayisi'));
        view()->share('oda.oda_sayfasi',compact('oda', 'sorular', 'katilanlar','katilan_sayisi'));

    }

    public function ajaxSorular($oda_kod)
    {
        $oda=Oda::where('oda_kod',$oda_kod)->where('aktif_mi', 1)->firstOrFail();

        $sorular = Soru::where('oda_id', $oda->id)->orderBy('olusturulma_tarihi', 'desc')->get();

        OdaKatilanlar::updateOrCreate([
            'kullanici_id' => auth()->id(),
            'oda_id'         => $oda->id
        ]);

        $katilanlar = OdaKatilanlar::where('oda_id', $oda->id)->get();
        $katilan_sayisi = OdaKatilanlar::where('oda_id', $oda->id)->count();


        return view('ajax.oda.sorular', compact('oda', 'sorular', 'katilanlar','katilan_sayisi'));
    }
    
        public function ajaxOnayBekleyen($oda_kod)
    {
        $oda=Oda::where('oda_kod',$oda_kod)->where('aktif_mi', 1)->firstOrFail();

        $sorular = Soru::where('oda_id', $oda->id)->orderBy('olusturulma_tarihi', 'desc')->get();

        OdaKatilanlar::updateOrCreate([
            'kullanici_id' => auth()->id(),
            'oda_id'         => $oda->id
        ]);

        $katilanlar = OdaKatilanlar::where('oda_id', $oda->id)->get();
        $katilan_sayisi = OdaKatilanlar::where('oda_id', $oda->id)->count();


        return view('ajax.oda.onay-bekleyen', compact('oda', 'sorular', 'katilanlar','katilan_sayisi'));
    }






    public function ara()
    {
        $aranan =request()->input('aranan');
        $odalar=Oda::where('oda_kod','like',"$aranan")->where('aktif_mi', 1)->get();

        return view('arama_sonucu',compact('odalar'));

    }

    public function oda_kapat($oda_kod)
    {
        $oda=Oda::where('oda_kod',$oda_kod)->firstOrFail();

        if ($oda->olusturan_kullanici_id == auth()->id()) {
            $oda->aktif_mi = 0;
            $oda->save();

            OdaKatilanlar::where('oda_id', $oda->id)->delete();
        }

        return redirect('/');
    }

    public function oda_cik($oda_kod)
    {
        $oda=Oda::where('oda_kod',$oda_kod)->firstOrFail();

        OdaKatilanlar::
            where('oda_id', $oda->id)
            ->where('kullanici_id', auth()->id())
            ->delete();

        return redirect('/');
    }

    public function onayla($soru_id, $durum)
    {
        $soru=Soru::where('id', $soru_id)->firstOrFail();
        $oda=Oda::where('id',$soru->oda_id)->firstOrFail();

        if ($oda->olusturan_kullanici_id == auth()->id()) {
            $soru->aktif_mi = $durum;
            $soru->save();
        }

        return redirect()->route('oda.oda_sayfasi', $oda->oda_kod);
    }

}
