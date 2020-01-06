@extends('layouts.master')
@section('title','Profil Düzenle')
@section('content')


<section id="profile">
    <div class="card border-0 m-2">
        <div class="card-block">

        </div>
        <form action="{{route('kullanici.guncelle',Auth::user()->kullanici_adi)}}" method="POST" enctype="multipart/form-data">

            {{csrf_field()}}

            <div class="text-center" >
                @if($profilSahibi->detay->profil_resmi!=null)
                    <a href="{{route('kullanici_sayfasi',Auth::user()->kullanici_adi)}}" title="Profile git">
                        <img src="{{ asset('/uploads/kullanici/profilresmi/'.$profilSahibi->kullanici_adi.'/'.$profilSahibi->detay->profil_resmi) }}" class="ppShow img-fluid my-2 " >
                    </a>

                @else
                    <a href="{{route('kullanici_sayfasi',Auth::user()->kullanici_adi)}}" title="Profile git">
                        <img src="{{ asset('/uploads/kullanici/profilresmi/profil.png') }}" class="ppShow img-fluid my-2 " >
                    </a>
                @endif

            </div>





            <div class="row text-center py-1">
                <div class="col-4 text-right"></div>
                <div class="col-8 text-left ">
                    <a href="{{route('kullanici.resmi_kaldir',Auth::user()->kullanici_adi)}}" class="btn btn-danger btn-xs  p-0 px-3 my-1" name="ppSil" > Kaldır</a>
                    <label for="files" class="btn btn-info btn-xs  p-0 px-3 my-1">Resmi Değiştir</label>
                    <input id="files" style="visibility:hidden;" type="file" name="profil_resmi">
                </div>
            </div>


            @include('layouts.partials.errors')
            @include('layouts.partials.alert')


            <div class="bg-light px-3 py-3" >

                <div class="row py-0 my-0">
                    <div class="col ">
                        <label for="isim" class="m-0 p-0 mx-3 lbl">İsim : </label>
                        <div class="input-group p-0 m-0" id="isim">

                            <input type="text" name="ad_soyad" class="form-control border-0 input-profil-duzenle" value="{{$profilSahibi->ad_soyad}}">

                        </div>
                    </div>
                </div>
                <div class="row py-0 my-0">
                    <div class="col">
                        <label for="kadi" class="m-0 p-0 mx-3 lbl">Mail : </label>
                        <div class="input-group p-0 m-0" id="kadi">

                            <input type="text" name="email" class="form-control border-0 input-profil-duzenle" value="{{$profilSahibi->email}}">

                        </div>
                    </div>
                </div>

                <div class="row py-0 my-0">
                    <div class="col">
                        <label for="kadi" class="m-0 p-0 mx-3 lbl">Kullanıcı Adı : </label>
                        <div class="input-group p-0 m-0" id="kadi">
                            <div class="input-group-prepend p-0 m-0">
                                <div class="input-group-text border-0 bg-white input-profil-duzenle pr-1 text-muted lbl">@</div>
                            </div>
                            <input type="text" name="kullanici_adi" class="form-control border-0 px-0 input-profil-duzenle" value="{{$profilSahibi->kullanici_adi}}">

                        </div>
                    </div>
                </div>


                <div class="row py-0 my-03">
                    <div class="col ">
                        <label for="web" class="m-0 p-0 mx-3 lbl ">Instagram Profili : </label>
                        <div class="input-group p-0 m-0" id="web">
                            <div class="input-group-prepend p-0 m-0">
                                <div class="input-group-text border-0 bg-white input-profil-duzenle pr-1 text-muted site-url">instagram.com/</div>
                            </div>
                            <input type="text" name="instagram_adres" class="form-control border-0 px-0 input-profil-duzenle" value="{{$profilSahibi->detay->instagram_adres}}">

                        </div>
                    </div>
                </div>

                <div class="row py-0 my-03">
                    <div class="col ">
                        <label for="web" class="m-0 p-0 mx-3 lbl">Twitter Profili : </label>
                        <div class="input-group p-0 m-0" id="web">
                            <div class="input-group-prepend p-0 m-0">
                                <div class="input-group-text border-0 bg-white input-profil-duzenle pr-1 text-muted site-url">twitter.com/</div>
                            </div>
                            <input type="text" name="twitter_adres" class="form-control border-0 px-0 input-profil-duzenle" value="{{$profilSahibi->detay->twitter_adres}}">
                        </div>
                    </div>
                </div>

                <div class="row py-0 my-03">
                    <div class="col ">
                        <label for="web" class="m-0 p-0 mx-3 lbl">Linked-in Profili : </label>
                        <div class="input-group p-0 m-0" id="web">
                            <div class="input-group-prepend p-0 m-0">
                                <div class="input-group-text border-0 bg-white input-profil-duzenle pr-1 site-url">linkedin/in/</div>
                            </div>
                            <input type="text" name="linkedin_adres" class="form-control border-0 px-0 input-profil-duzenle" value="{{$profilSahibi->detay->linkedin_adres}}">
                        </div>
                    </div>
                </div>

                <div class="row py-0 my-03">
                    <div class="col ">
                        <label for="web" class="m-0 p-0 mx-3 lbl">Facebook Profili : </label>
                        <div class="input-group p-0 m-0" id="web">
                            <div class="input-group-prepend p-0 m-0">
                                <div class="input-group-text border-0 bg-white input-profil-duzenle pr-1  site-url">facebook.com/</div>
                            </div>
                            <input type="text" name="facebook_adres" class="form-control border-0 px-0 input-profil-duzenle" value="{{$profilSahibi->detay->facebook_adres}}">
                        </div>
                    </div>
                </div>
                <div class="row py-0 my-03">
                    <div class="col ">
                        <label for="web" class="m-0 p-0 mx-3 lbl">Youtube Profili : </label>
                        <div class="input-group p-0 m-0" id="web">
                            <div class="input-group-prepend p-0 m-0">
                                <div class="input-group-text border-0 bg-white input-profil-duzenle pr-1  site-url">youtube.com/</div>
                            </div>
                            <input type="text" name="youtube_adres" class="form-control border-0 px-0 input-profil-duzenle" value="{{$profilSahibi->detay->youtube_adres}}">
                        </div>
                    </div>
                </div>
                <div class="row py-0 my-0">
                    <div class="col ">
                        <label for="web" class="m-0 p-0 mx-3 lbl">Web Adresi : </label>
                        <div class="input-group p-0 m-0" id="web">
                            <input type="text" name="web_adres" class="form-control border-0 input-profil-duzenle" value="{{$profilSahibi->detay->web_adres}}">
                        </div>
                    </div>
                </div>

                <div class="row py-0 my-03">
                    <div class="col ">
                        <label for="web" class="m-0 p-0 mx-3 lbl">Bio : </label>
                        <div class="input-group p-0 m-0" id="web">
                            <textarea name="bio" class="form-control border-0 input-profil-duzenle" rows="3" style="resize: none;" >{{$profilSahibi->detay->bio}}</textarea>
                        </div>
                    </div>
                </div>



                <div class="row py-0 my-03">
                    <div class="col ">
                        <div class="input-group p-0 m-0" id="web">
                            <input type="submit" name="guncelleProfil" class="btn btn-dark form-control" value="Güncelle">
                        </div>
                    </div>
                </div>

                <!--
                <div class="row text-center py-1">
                    <div class="col-4 text-right">Gender</div>
                    <div class="col-8 text-left ">
                        <select id="heard" class="form-control" name="cinsiyet" required>
                            <option value="0" selected>Belirtmek istemiyorum</option>
                            <option value="1" >Erkek</option>
                            <option value="2" >Kadın</option>

                        </select>
                    </div>
                </div>
                -->



                <div class="row text-center py-1">
                    <div class="col-4 text-right"></div>
                    <div class="col-8 text-left ">
                    </div>
                </div>
            </div>

        </form>




    </div>


    </div>
</section>

@endsection
@section('footer')

    <script>
        setTimeout(function () {
            $('.alert').slideUp(100);

        },6000);


    </script>
@endsection
