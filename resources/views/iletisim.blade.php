@extends('layouts.master')
@section('title','İletisim')
@section('content')


    <div class="card-header bg-transparent pt-4">

        <div class="pb-0 pt-1">
            <strong class="text-muted  m-0">Bizimle iletişime geçebilirsiniz...</strong>

        </div>

    </div>
    <div class="card-body" style="font-family:Open Sans, Helvetica, Arial, sans-serif;">

    @include('layouts.partials.errors')
    @include('layouts.partials.alert')


    <form class=""  role="form" action="{{route('iletisim')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div>
            <input type="email"  class="form-control bg-light border-0 my-2 py-3 " name="email" placeholder="Email"></div>
        <div>
            <input type="text"  class="form-control bg-light border-0 my-2 py-3 " name="ad_soyad" placeholder="Ad&Soyad" value="" >
        </div>
        <div>
            <input type="text"  class="form-control bg-light border-0 my-2 py-3 " name="mesaj_baslik" placeholder="Başlık" value="" >
        </div>
        <div class="form-group">
            <textarea class="form-control bg-light border-0 my-2 py-3  " name="mesaj_detay" id="exampleFormControlTextarea1" style="resize:none;" rows="4" placeholder="Görüş ve önerilerinizi iletebilirsiniz" required=""></textarea>
        </div>
        <div>
            <button name="btnRegister" id="btnContact" class="btn btn-dark btn-lg btn-block ">Gönder</button>
        </div>


    </form>
    <div class="card-footer mt-4 text-center">
         <a href="https://www.instagram.com/questations"><i class="fab fa-instagram fa-2x mx-2 golge-icon"></i></a>
        <a href="https://www.twitter.com/questations"><i class="fab fa-twitter-square fa-2x mx-2 golge-icon"></i></a>
        <a href="https://www.youtube.com/channel/UCUCyZYStgNJE8wLOF3CTgeQ"><i class="fab fa-youtube-square fa-2x mx-2 golge-icon"></i></a>
        <!-- <a href=""><i class="fas fa-envelope fa-2x mx-2 golge-icon"></i></a>-->
        <a href="https://www.facebook.com/questations"><i class="fab fa-facebook-square fa-2x mx-2 golge-icon"></i></a>

    </div>
    </div>


@endsection
@section('footer')

    <script>
        setTimeout(function () {
            $('.alert').slideUp(2000);

        },6000);


    </script>
@endsection
