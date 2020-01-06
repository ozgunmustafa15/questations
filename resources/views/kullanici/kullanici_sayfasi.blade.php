@extends('layouts.master')
@section('title','Kullanıcı')
@section('content')

    <div class="d-md-flex   my-0">

        <!-- First Half -->

        <div class="col-md-6 p-0 bg-indigo">
            <div class="d-md-flex align-items-center  text-center justify-content-center">
                <div class="text-center bg-light w-100" style="border-radius: 20px;margin-top: 5px">


                    @if($profilSahibi->detay->profil_resmi!=null)
                        <a href="{{route('kullanici.guncelle_form',Auth::user()->kullanici_adi)}}">
                            <img src="{{ asset('/uploads/kullanici/profilresmi/'.$profilSahibi->kullanici_adi.'/'.$profilSahibi->detay->profil_resmi) }}" class="ppShow img-fluid my-2 " style="">
                        </a>

                    @else
                        <img src="{{ asset('/uploads/kullanici/profilresmi/profil.png') }}" class="ppShow img-fluid my-2 "  >
                    @endif
                    <br>
                    <h5 class="bg-white mt-2 p-1">{{ $profilSahibi->ad_soyad }}</h5>
                </div>
            </div>
        </div>

        <!-- Second Half -->

        <div class="col-md-6 p-0 my-0 bg-white loginarea">
            <div class="d-md-flex   text-left">
                <div class="h6 ">
                        @if(strlen($profilSahibi->detay->instagram_adres)>0)

                            <i class="fab fa-instagram my-1 mx-2 fa-2x"></i>
                            <a target="_blank" href="http://www.instagram.com/{{$profilSahibi->detay->instagram_adres}}" class="bg-white input-profil-duzenle pr-1">
                                {{'instagram.com/'.$profilSahibi->detay->instagram_adres}}
                            </a>
                            <br>
                        @endif

                        @if(strlen($profilSahibi->detay->linkedin_adres)>0)
                            <i class="fab fa-linkedin my-1 mx-2 fa-2x"></i>
                            <a target="_blank"  href="http://www.linkedin.com/in/{{$profilSahibi->detay->linkedin_adres}}" class="bg-white input-profil-duzenle pr-1">
                                {{'linkedin.com/in/'.$profilSahibi->detay->linkedin_adres}}
                            </a>
                            <br>
                        @endif
                        @if(strlen($profilSahibi->detay->youtube_adres)>0)
                            <i class="fab fa-youtube-square my-1 mx-2 fa-2x"></i>
                            <a target="_blank" href="http://www.youtube.com/{{$profilSahibi->detay->youtube_adres}}" class="bg-white input-profil-duzenle pr-1">
                                {{'youtube.com/'.$profilSahibi->detay->youtube_adres}}
                            </a>
                            <br>
                        @endif
                        @if(strlen($profilSahibi->detay->twitter_adres)>0)
                            <i class="fab fa-twitter-square my-1 mx-2 fa-2x"></i>
                            <a target="_blank" href="http://www.twitter.com/{{$profilSahibi->detay->twitter_adres}}" class="bg-white input-profil-duzenle pr-1">
                                {{'twitter.com/'.$profilSahibi->detay->twitter_adres}}
                            </a>
                            <br>
                        @endif
                        @if(strlen($profilSahibi->detay->facebook_adres)>0)
                            <i class="fab fa-facebook my-1 mx-2 fa-2x"></i>
                            <a target="_blank" href="http://www.facebook.com/{{$profilSahibi->detay->facebook_adres}}" class="bg-white input-profil-duzenle pr-1">
                                {{'facebook.com/'.$profilSahibi->detay->facebook_adres}}</a>
                            <br>
                        @endif
                        @if(strlen($profilSahibi->detay->web_adres)>0)
                            <i class="fas fa-globe my-1 mx-2 fa-2x"></i>
                                <a target="_blank" href="http://{{$profilSahibi->detay->web_adres}}" class="bg-white input-profil-duzenle pr-1">
                                {{$profilSahibi->detay->web_adres}}
                            </a>
                            <br>
                        @endif

                </div>
            </div>
        </div>

    </div>

    <div class="card border-0 m-2">
        <div class="card-block">

            @if(Auth::user()->kullanici_adi==$profilSahibi->kullanici_adi)
                <a href="{{route('kullanici.guncelle_form',@$profilSahibi->kullanici_adi)}}" style="text-decoration: none"> <button class="btn btn-dark btn-block my-4">Profili Düzenle</button></a>
            @endif
            <div>
                <p class="text-muted text-center mx-3" style="letter-spacing: 1px">
                    {{$profilSahibi->detay->bio}}
                </p>
            </div>
            @if(count($olusturdugu_odalar)>0)

                    <div class="card" style="">
                        <div class="card-header">
                            Daha önce Oluşturduğu odalar
                        </div>
                        <div class="card-body">
                            @foreach($olusturdugu_odalar as $oda_bilgi)

                                <hr class="p-0 mb-1 mt-0">


                                <p class="text-white bg-danger rounded p-1 golge">{{$oda_bilgi->oda_aciklama}}</p>
                                <label><strong>Kod : </strong>{{$oda_bilgi->oda_kod}}
                                </label><br>
                                <label><strong>Konum : </strong>{{$oda_bilgi->oda_konum}}</label><br>

                                <hr class="p-0 mb-1 mt-0 ">
                            @endforeach
                        </div>
                    </div>



            @endif
        </div>
    </div>

<!--

    <section id="profile">
        <div class="card border-0 m-2">
            <div class="card-block">
                <div class="row">
                    <div class="text-center col m-0 p-0">
                        <img src="" class="ppShow img-fluid my-0 " ><br>
                        <h4>{{ $profilSahibi->ad_soyad }}</h4>
                    </div>
                    <div class="text-left col">
                        <div class="h6 ">
                            <a target="_blank" href=""><i class="fab fa-instagram my-1 mx-2 fa-2x"> </i>{{'@'.$profilSahibi->detay->instagram_adres}}</a><br>
                            <a target="_blank" href=""><i class="fab fa-linkedin my-1 mx-2 fa-2x"> </i>{{'@'.$profilSahibi->detay->linkedin_adres}}</a><br>
                            <a target="_blank" href=""><i class="fab fa-twitter my-1 mx-2 fa-2x"> </i>{{'@'.$profilSahibi->detay->twitter_adres}}</a><br>
                            <a target="_blank" href=""><i class="fab fa-facebook my-1 mx-2 fa-2x"> </i>{{'@'.$profilSahibi->detay->facebook_adres}}</a><br>
                            <a target="_blank" href=""><i class="fas fa-globe my-1 mx-2 fa-2x"></i>{{'@'.$profilSahibi->detay->web_adres}}</a>
                        </div>
                    </div>
                </div>
                <a href="" style="text-decoration: none"> <button class="btn btn-dark btn-block my-4">Profili Düzenle</button></a>

                <div>
                    <p class="text-muted text-center mx-3">
                        {{$profilSahibi->detay->bio}}
                    </p>
                </div>

                <table class="table table-md">
                    <thead>
                    <tr>
                        <th  scope="col">Konu</th>
                        <th scope="col">Konum</th>
                        <th scope="col">Kişi Sayısı</th>
                        <th scope="col">Tarih</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>55</td>
                        <td>55</td>
                    </tr>
                    <tr>

                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>6</td>
                        <td>55</td>
                    </tr>
                    <tr>

                        <td>Larry the Bird</td>
                        <td>Bird</td>
                        <td>66</td>
                        <td>55</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </section>

-->













@endsection
