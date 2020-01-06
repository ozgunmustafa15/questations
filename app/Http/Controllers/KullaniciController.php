<?php

namespace App\Http\Controllers;


use App\Models\Kullanici;
use App\Mail\KullaniciKayitMail;
use App\Models\KullaniciDetay;
use App\Oda;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Auth;

class KullaniciController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['oturumukapat','kullanici_sayfasi','guncelle_form','guncelle','resmi_kaldir','ara']);
    }
    public function giris_form()
    {
        return view('kullanici.girisyap');
    }

    public function giris()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'sifre'=>'required'
        ]);
        $credentials=[
            'email'     =>  request('email'),
            'password'  =>  request('sifre')
            //'aktif_mi'=>1//aktif kişilerin giriş yapabilmesi
            ];
        if (auth()->attempt($credentials,request()->has('benihatirla')))
        {
            request()->session()->regenerate();
            return redirect()->intended('nav-menu');

        }
        else
        {
            $errors=['email'=>'Bilgiler doğru değil'];
            return back()->withErrors($errors);
        }
    }

    public function kaydol_form()
    {
        return view('kullanici.kayitol');

    }
    public function kullanici_sayfasi($kullanici_adi)
    {
        $profilSahibi=Kullanici::where('kullanici_adi',$kullanici_adi)->firstOrFail();
        $detaylar = KullaniciDetay::where('kullanici_id', $profilSahibi->id)->get();
        $olusturdugu_odalar=Oda::where('olusturan_kullanici_id',$profilSahibi->id)->orderBy('olusturulma_tarihi', 'desc')->get();
        return view('kullanici.kullanici_sayfasi',compact('profilSahibi','detaylar','olusturdugu_odalar'));

    }

    public function guncelle_form($kullanici_adi)
    {
        if($kullanici_adi==Auth::user()->kullanici_adi)
        {
            $profilSahibi=Kullanici::where('kullanici_adi',$kullanici_adi)->firstOrFail();
            $detaylar = KullaniciDetay::where('kullanici_id', $profilSahibi->id)->get();
            return view('kullanici.kullanici_duzenle',compact('profilSahibi','detaylar'));
        }
        else
        {
            return redirect()
                ->route('kullanici.guncelle_form',Auth::user()->kullanici_adi);
        }

    }
    public function guncelle($kullanici_adi)
    {
        if($kullanici_adi==Auth::user()->kullanici_adi)
        {
            $this->validate(request(),[
                'email'=>'required|email',
                'ad_soyad'=>'required',
                'kullanici_adi'=>'required'
            ]);


            $data=request()->only('ad_soyad','email','kullanici_adi');


            $kisi_guncelle=Kullanici::where('kullanici_adi',$kullanici_adi)->firstOrFail();
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


            KullaniciDetay::updateOrCreate(['kullanici_id'=>Auth::user()->id],
                [
                    'web_adres'=>request('web_adres'),
                    'youtube_adres'=>request('youtube_adres'),
                    'instagram_adres'=>request('instagram_adres'),
                    'linkedin_adres'=>request('linkedin_adres'),
                    'twitter_adres'=>request('twitter_adres'),
                    'cinsiyet'=>request('cinsiyet'),
                    'bio'=>request('bio'),
                    'facebook_adres'=>request('facebook_adres')

                ]);
            return redirect()
            ->route('kullanici.guncelle_form',Auth::user()->kullanici_adi)
            ->with('mesaj','Başarıyla güncellendi')
            ->with('mesaj_tur','success');

        }




    }

    public function resmi_kaldir($kullanici_adi)
    {

        $kullanici=Kullanici::where('kullanici_adi',$kullanici_adi)->firstOrFail();
        $detay=KullaniciDetay::where('kullanici_id',$kullanici->id)->firstOrFail();
        $detay->profil_resmi = '';
        $detay->save();
        return redirect()
            ->route('kullanici.guncelle_form',Auth::user()->kullanici_adi)
            ->with('mesaj','Resim kaldırıldı')
            ->with('mesaj_tur','success');

    }


    public function kayitol()
    {
        $this->validate(request(),[

            'ad_soyad'       =>'required|min:6|max:60',
            'email'          =>'required|email|unique:kullanici',
            'sifre'          =>'required|confirmed|min:6',
            'kullanici_adi'  =>'required|min:6|max:20|unique:kullanici|not_regex:/[^A-Za-z0-9_]/'

        ]);

        $kullanici=Kullanici::create([
            'ad_soyad'=>request('ad_soyad'),
            'kullanici_adi'=>request('kullanici_adi'),
            'email'=>request('email'),
            'sifre'=>Hash::make(request('sifre')),
            'aktivasyon_anahtari'=>Str::random(60),
            'aktif_mi'=>1



        ]);
        //Mail::to(request('email'))->send(new KullaniciKayitMail($kullanici));

        auth()->login($kullanici);

        return redirect()->route('nav-menu');
    }

/*
    public function aktivasyon($anahtar){
        $kullanici=Kullanici::where('aktivasyon_anahtari',$anahtar)->first();
        if (!is_null($kullanici))
        {
            $kullanici->aktivasyon_anahtari=null;
            $kullanici->aktif_mi=1;
            $kullanici->save();
            return redirect()->route('nav-menu')
                ->with('mesaj','Aktivasyon işlemi gerçekleştirildi ')
                ->with('mesaj_tur','info');
        }
        
        
            return redirect()->route('nav-menu')
                ->with('mesaj','Aktivasyon işlemini tamamlayın ')
                ->with('mesaj_tur','danger');

        
        

    }*/
    public function oturumukapat(){

        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('anasayfa');
    }


    public function ara()
    {
        if (request()->filled('aranan'))
        {
            request()->flash();
            $aranan=request('aranan');
            $kullanicilar=Kullanici::where('email','like' ,"%$aranan%")
                ->orWhere('kullanici_adi','like',"%$aranan%")
                ->orWhere('ad_soyad','like',"%$aranan%")
                ->get();


            return view('kullanici.arama_sonucu', compact('kullanicilar','aranan'));

        }
    }
}
