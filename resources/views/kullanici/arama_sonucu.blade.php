@extends('layouts.master')
@section('title','Kullanıcı Ara')
@section('content')





   



    <label class="mb-0 mt-3 ml-3 mr-3 ">"{{$aranan}}" için arama sonuçları</label>
    <hr class="mt-0 mb-3">
    
 @if(count($kullanicilar)==0)
        <div class="card mx-2">
            <div class="card-body">
                <div class="col h5" style="font-family: Monospaced;"> Kullanıcı bulunamadı veya kullanıcı aktif değil.</div>

            </div>
        </div>
        <hr class="my-0">
    @endif

    @foreach($kullanicilar as $kullanici)


        <a href="{{route('kullanici_sayfasi', $kullanici->kullanici_adi)}}"  style="text-decoration:none;" title="Profili Görüntüle">
        <div class="card mx-2 my-2 kullanici-liste" >
            <div class="card-body p-2" >
 <div class="row align-content-center justify-content-center">
                    <div class="col-2 text-center pr-1">
                        @if($kullanici->detay->profil_resmi)
                                    <img src="{{ asset('/uploads/kullanici/profilresmi/'.$kullanici->kullanici_adi.'/'.$kullanici->detay->profil_resmi) }}" class="img-fluid my-2"  style="width: 41px;height: 41px; border-radius: 100%">
                                @else
                                    <img src="{{ asset('/uploads/kullanici/profilresmi/profil.png') }}" class="img-fluid my-2"  style="width: 41px;height: 41px; border-radius: 100%">


                                @endif
                    </div>
                    
                    <div class="col-10 pl-1">
                        <div class="h5 text-danger" style="font-family: Monospaced;">{{$kullanici->ad_soyad}} </div>
                        <small class="help-block">{{'@'.$kullanici->kullanici_adi}} </small>
                    </div>
                </div>

            </div>
        </div>
        </a>
    @endforeach
@endsection
