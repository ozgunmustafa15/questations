@extends('layouts.master')
@section('title','Oturum Aç')
@section('content')




        <div class="card border-light">
            <div class="card-header bg-transparent pt-4">

                <div class="">
                    <strong class="text-muted pb-1 pt-1 m-0 ">Giriş yap</strong>
                </div>
            </div>


            <div class="card-body mt-1">
                @include('layouts.partials.errors')
                <form action="{{route("kullanici.girisyap")}}" method="post" class="was-validated"  role="form">

                    <div><input type="hidden" name="_token" value="{{csrf_token()}}"></div>

                    <div><input type="email" name="email" id="emailGiris" class="form-control bg-light border-0 my-2 py-3" placeholder="E-Posta"></div>
                    <div><input type="password" name="sifre" id="parolaGiris" class="form-control bg-light border-0 my-2 py-3 "  placeholder="Şifre" value="" ></div>
                    <div class="text-muted"><input type="checkbox" name="benihatirla" checked class="mr-1 my-2"><i>Beni Hatırla</i> </div>

                    <div><button id="girisBtn" name="girisBtn" class="btn btn-dark btn-lg btn-block ">Giriş Yap</button></div>
                </form>

            </div>
            <div class="card-footer text-center text-muted ">
                <div class="gecis"><strong><label class="font-weight-light">Hesabın yoksa </label><a href="{{route("kullanici.kayitol")}}" class=""> üye ol</a></strong></div>
            </div>

        </div>




@endsection

@section('footer')

    <script>
        setTimeout(function () {
            $('.alert').slideUp(100);

        },6000);


    </script>
@endsection
