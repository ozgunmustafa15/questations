@extends('layouts.master')
@section('title','Oda Ara')
@section('content')
    <a href="{{route('nav-menu')}}">
        <img class="card-img-top img-fluid my-2" src="{{asset('img/questationsoda.png')}}">
    </a>

    <form action="{{route('oda_ara')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">


        <div class="input-group input-group-lg p-0 m-0">
            <div class="input-group-prepend p-0 m-0">
                <div class="input-group-text  bg-light border-0"><i class="fab fa-slack-hash"></i></div>
            </div>
            <input type="text" name="aranan" class="form-control border-light bg-light pl-0 py-2"
                   placeholder="Kodu buradan aratabilirsiniz" aria-label="Recipient's username"
                   aria-describedby="button-addon2" style="font-size:17px;">
            <div class="input-group-append">
                <!--  -->
                <button type="submit" href="" class="btn btn-dark p-2 py-2" id="button-addon2" style="font-size:17px;">Oda Ara</button>
            </div>
        </div>

    </form>


    @if(count($odalar)<1)
        <div class="card mx-2">
            <div class="card-body">
               <div class="col h5" style="font-family: Monospaced;"> Böyle bir oda bulunamadı veya oda aktif değil.</div>

            </div>
        </div>
        <hr class="my-0">
    @endif





    @foreach($odalar as $oda)


        <a href="{{route('oda.oda_sayfasi', $oda->oda_kod)}}"  style="text-decoration:none;" title="Katıl">
            <div class="card mx-2 my-2 kullanici-liste" >
                <div class="card-body p-2" >
                    <div class="row ">
                        <div class="col h4 text-danger" style="font-family: Monospaced;">{{$oda->oda_kod}} </div>
                    </div>
                    <small class="help-block">{{$oda->olusturan_kullanici->ad_soyad}} </small>
                    <br>
                    <small class="help-block">{{$oda->oda_aciklama}} </small>
                </div>
            </div>
        </a>
    @endforeach
@endsection
