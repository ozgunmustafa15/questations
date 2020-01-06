<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kullanici;
use App\Models\KullaniciDetay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class KullaniciController extends Controller
{
    public function oturumac()
    {
        if (request()->isMethod('POST'))
        {
            $this->validate(request(),[
                'email'=>'required|email',
                'sifre'=>'required'
            ]);

            $credetials=[
                'email'=>request()->get('email'),
                'password'=>request()->get('sifre'),
                'yonetici_mi'=>1,
                'aktif_mi'=>1
            ];

            if (Auth::guard('yonetim')->attempt($credetials,request()->has('benihatirla')))
            {
                return redirect()->route('yonetim.anasayfa');
            }
            else
            {
                return back()->withInput()
                    ->withErrors(['email'=>'Giriş hatalı']);
            }
        }
        return view('yonetim.oturumac');
    }

    public function oturumukapat()
    {
        Auth::guard('yonetim')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('yonetim.oturumac');
    }

    public function index()
    {
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan=request('aranan');
            $list=Kullanici::where('email','like' ,"%$aranan%")
                ->orWhere('kullanici_adi','like',"%$aranan%")
                ->orWhere('ad_soyad','like',"%$aranan%")
                ->paginate(8);
        }
        else {
            $list = Kullanici::orderByDesc('olusturulma_tarihi')->paginate(10);
        }
        return view('yonetim.kullanici.index', compact('list'));

    }

    public function form($id = 0)
    {
        $entry=new Kullanici;
        if ($id > 0)
        {
            $entry=Kullanici::find($id);
        }
        return view('yonetim.kullanici.form',compact('entry'));
    }
    public function kaydet($id=0)
    {
        $this->validate(request(),[
            'kullanici_adi'=>'required|min:5',
            'email'=>'required|min:8',
            'ad_soyad'=>'required|min:5'
        ]);

        $data=request()->only('ad_soyad','email','kullanici_adi');

        if (request()->filled('sifre'))
            $data['sifre']=Hash::make(request('sifre'));

        $data['aktif_mi']=request()->has('aktif_mi')&& request('aktif_mi')==1 ? 1 : 0;
        $data['yonetici_mi']=request()->has('yonetici_mi')&& request('yonetici_mi')==1 ? 1 : 0;


        if ($id>0)
        {
            $entry=Kullanici::where('id',$id)->firstOrFail();
            $entry->update($data);
        }
        else
        {
            $entry=Kullanici::create($data);
        }

        $kisi_guncelle=Kullanici::where('id',$id)->firstOrFail();
        $kisi_guncelle->update($data);


        if (request()->hasFile('profil_resmi'))
        {
            $this->validate(request(),[
                'profil_resmi'   =>'image|mimes:jpg,png,jpeg|max:2046'
            ]);
            $profil_resmi=request()->profil_resmi;

            $dosya_adi=$kisi_guncelle->kullanici_adi."-".strtoupper(str_random(10)).".".$profil_resmi->extension();

            if ($profil_resmi->isValid())
            {
                $profil_resmi->move('uploads/kullanici/profilresmi/'.$kisi_guncelle->kullanici_adi,$dosya_adi);
                KullaniciDetay::updateOrCreate(
                    ['kullanici_id'=>$kisi_guncelle->id],
                    ['profil_resmi'=>$dosya_adi]
                );
            }
        }


        KullaniciDetay::updateOrCreate(['kullanici_id'=>$entry->id],
            [
                'web_adres'=>request('web_adres'),
                'youtube_adres'=>request('youtube_adres'),
                'instagram_adres'=>request('instagram_adres'),
                'linkedin_adres'=>request('linkedin_adres'),
                'facebook_adres'=>request('facebook_adres')

            ]);
        return redirect()
            ->route('yonetim.kullanici.duzenle',$entry->id)
            ->with('mesaj','Başarıyla'. ($id>0?' güncellendi':'kaydedildi'))
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        Kullanici::destroy($id);
        return redirect()
            ->route('yonetim.kullanici')
            ->with('mesaj','Kayıt Silindi' )
            ->with('mesaj_tur','success');

    }
}
