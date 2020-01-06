@extends('yonetim.layouts.master')
@section('title','Mesajlar')
@section('content')



    <section class="row text-center ">
        @foreach($liste as $mesajlar)
        <div class=" col col-lg-3 col-md-2 col-xl-2 col-sm-6 ">
            <div class="panel panel-primary">
                <div class="panel-heading">{{$mesajlar->ad_soyad}}</div>
                <div class="panel-body">
                    <small class="text-muted"> {{$mesajlar->mesaj_baslik}} </small>
                    <h5 class="text-center">
                        {{$mesajlar->mesaj_detay}}
                    </h5>
                    <small class="text-muted ">{{$mesajlar->email}} </small>
                </div>
            </div>
        </div>
        @endforeach
    </section>











@endsection
