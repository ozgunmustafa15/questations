@extends('layouts.master')
@section('title','Kayıt Ol')
@section('content')



        <div class="card border-light mb-3">
            <div class="card-header bg-transparent pt-3">
                <div class="pb-0 pt-1">
                    <strong class="text-muted  m-0">Kaydol</strong>
                </div>
            </div>

            <div class="card-body">

                @include('layouts.partials.errors')

                <form class="was-validated" method="POST" role="form" action="{{route('kullanici.kayitol')}}" >
                    {{csrf_field()}}
                    <div><input value="{{old('email')}}"type="email" class="form-control bg-light border-0 my-2 py-3" name="email" placeholder="E-Posta"></div>
                    <div><input value="{{old('kullanici_adi')}}"type="text"  class="form-control bg-light border-0 my-2 py-3" name="kullanici_adi" placeholder="Kullanıcı Adı"></div>
                    <div><input value="{{old('ad_soyad')}}" type="text"  class="form-control bg-light border-0 my-2 py-3" name="ad_soyad" placeholder="Ad Soyad"></div>

                    <div><input type="password" id="sifre" class="form-control bg-light border-0 my-2 py-3" name="sifre" placeholder="Şifre"></div>
                    <div><input type="password" id="sifre_confirmation" class="form-control bg-light border-0 my-2 py-3" name="sifre_confirmation" placeholder="Şifre Tekrar" value="" ></div>
                    <div class="custom-control custom-checkbox mb-3" >
                        <input type="checkbox" style="color: #f62459" name="sozlesme" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1" style="color:#2a6496!important;"><a href="" data-toggle="modal" data-target="#myModal"> Sözleşmenin detayları</a>nı okudum,kabul ediyorum</label>
                        <div class="invalid-feedback">burayı işaretmeniz gerekiyor</div>
                    </div>


                    <div><button name="btnRegister" id="btnKayit" class="btn btn-dark btn-lg btn-block">Kayıt Ol</button></div>

                </form>
            </div>

            <!--modal kısmı -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sözleşme Detayları</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center text-muted">
                <div class="gecis"><strong><label class="font-weight-light">Hesabın varsa </label><a href="{{route("kullanici.girisyap")}}" class=""> giriş yap</a></strong></div>
            </div>
            <!--modal kısmı -->
        </div>




@endsection

