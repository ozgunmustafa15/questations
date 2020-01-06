<?php

namespace App\Http\Controllers\Yonetim;
use App\Models\Kullanici;
use App\Oda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OdaKatilanlar;
use App\Models\Soru;


class OdaController extends Controller
{
    public function index()
    {

        if (request()->filled('aranan'))
        {
            $aranan=request('aranan');
            $list=Oda::where('oda_kod','like' ,"%$aranan%")
               // ->orWhere('kullanici_adi','like', "%$aranan%")
                ->paginate(8);
        }
        else {
            $list = Oda::orderByDesc('olusturulma_tarihi')->paginate(10);
        }

        return view('yonetim.oda.index',compact('list'));
    }

    public function form($id = 0)
    {

        if ($id > 0)
        {
            $entry=Oda::find($id);
            $oda=Oda::where('id',$id)->firstOrFail();

            $sorular = Soru::where('oda_id', $oda->id)->orderBy('olusturulma_tarihi', 'asc')->get();

            $katilanlar = OdaKatilanlar::where('oda_id', $oda->id)->get();

        }
        return view('yonetim.oda.form',compact('entry','oda', 'sorular', 'katilanlar'));


    }





    public function kaydet($id=0)
    {


        $data['aktif_mi']=request()->has('aktif_mi')&& request('aktif_mi')==1 ? 1 : 0;


        if ($id>0)
        {
            $entry=Oda::where('id',$id)->firstOrFail();
            $entry->update($data);

        }
        else

        {
            $entry=Oda::create($data);
        }


        return redirect()
            ->route('yonetim.oda.duzenle',$entry->id)
            ->with('mesaj','Başarıyla'. ($id>0?' güncellendi':'kaydedildi'))
            ->with('mesaj_tur','success');
    }




}
