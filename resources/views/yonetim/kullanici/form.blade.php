@extends('yonetim.layouts.master')
@section('title','Kullanıcı Yönetimi')
@section('content')




    <h1 class="page-header">Kullanıcı Yönetimi</h1>

    <form  method="post" action="{{route('yonetim.kullanici.kaydet',@$entry->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$entry-> id > 0 ? "Guncelle":"Kaydet"}}
            </button>

        </div>
        <h3 class="sub-header">Kullanıcı {{@$entry->id>0 ? "Düzenle":"Kaydet"}}</h3>

        @include('layouts.partials.errors')
        @include('layouts.partials.alert')


        <div class="d-md-flex h-md-100 align-items-center">


            <div class="col-md-6 p-0 bg-indigo h-md-100">
                <div class="d-md-flex  h-md-100 p-5 justify-content-center">
                    <div class="logoarea pt-5 pb-5">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <span class="label label-danger p-2 m-2">Hesap Bilgiler</span>
                            </div>
                            <div class="panel-body">

                                <div class="col" >
                                    <div class="form-group text-center ">
                                        @if($entry->detay->profil_resmi)
                                        <img src="{{ asset('/uploads/kullanici/profilresmi/'.$entry->kullanici_adi.'/'.$entry->detay->profil_resmi) }}" style="width: 100%; padding-left: 50px;padding-right: 50px ;">
                                        @else
                                            <img src="{{ asset('/uploads/kullanici/profilresmi/profil.png') }}" class=" " style="width: 75%; padding-left: 50px;padding-right: 50px ;">

                                        @endif

                                    </div>
                                </div>
                                <div class="col">
                                    <a href="" class="btn btn-danger btn-xs  p-0 px-3 my-1" name="ppSil" >Resmi Kaldır</a>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label for="kullanici_adi" class="">Profil Resmi Seç</label>
                                        <input type="file" name="profil_resmi" id="urun_resmi" class=" form-control" >
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="kullanici_adi">Kullanıcı Adı</label>
                                        <input type="text" name="kullanici_adi" class="form-control" id="kullanici_adi" placeholder="Kullanıcı Adı" value="{{$entry->kullanici_adi}}">

                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label for="ad_soyad">Ad Soyad</label>
                                        <input type="text" name="ad_soyad" class="form-control" id="ad_soyad" placeholder="Ad Soyad" value="{{$entry->ad_soyad}}">

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email Adres</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$entry->email}}">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sifre">Şifre</label>
                                        <input type="password" name="sifre" class="form-control" id="sifre" placeholder="Sifre">

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="cinsiyet">Cinsiyet</label>
                                    <select class="form-control " name="cinsiyet">
                                        <option>Kadın</option>
                                        <option>Erkek</option>
                                        <option>Belirtmek İstemiyor</option>

                                    </select>
                                </div>
                                <div class="col">
                                    <div class="checkbox bg-warning">
                                        <label class="">
                                            <input type="checkbox" name="aktif_mi" value="1" {{$entry->aktif_mi ? 'checked':''}}>Aktif mi?
                                        </label>
                                        <label>
                                            <input type="checkbox" name="yonetici_mi" value="1" {{$entry->yonetici_mi ? 'checked':''}}>Yönetici mi?
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>





                    </div>
                </div>
            </div>



            <div class="col-md-6 p-0 h-md-100 loginarea ">
                <div class=" d-md-flex align-items-center h-md-100 p-5 justify-content-center">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <span class="label label-primary p-2 m-2">Sosyal Medya Bilgileri</span>
                        </div>
                        <div class="panel-body">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="web-site">Web Sitesi</label>
                                    <input type="text" name="web_adres" class="form-control" id="web_adres" placeholder="Web Sitesi" value="{{$entry->detay->web_adres}}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook_adres" class="form-control" id="facebook" placeholder="Facebook adresi" value="{{$entry->detay->facebook_adres}}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram_adres" class="form-control" id="instagram" placeholder="Instagram adresi" value="{{$entry->detay->instagram_adres}}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="instagram">Linked In</label>
                                    <input type="text" name="linkedin_adres" class="form-control" id="linkedin" placeholder="Linked-in adresi" value="{{$entry->detay->linkedin_adres}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="instagram">Youtube</label>
                                    <input type="text" name="youtube_adres" class="form-control" id="youtube" placeholder="Youtube adresi" value="{{$entry->detay->youtube_adres}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection

@section('footer')

    <script>
        setTimeout(function () {
            $('.alert').slideUp(100);

        },6000);


    </script>
@endsection





