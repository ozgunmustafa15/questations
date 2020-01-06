@extends('layouts.master')
@section('title','Questations')
@section('content')


    <a href="{{route('nav-menu')}}">
        <img class="card-img-top img-fluid my-2" style="opacity: 0.9" src="{{asset('img/questationsoda.png')}}">
    </a>
    @if(session()->has('mesaj'))
        <div class="container">
            <div class="alert alert-{{session('mesaj_tur')}}">{{session('mesaj')}}</div>
        </div>
    @endif

    @include('layouts.partials.errors')


    <div class="text-right"><strong></strong></div>
    <nav class="mt-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
               aria-controls="nav-home" aria-selected="true">Odaya Katıl</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
               aria-controls="nav-profile" aria-selected="false">Oda Oluştur</a>
        </div>
    </nav>
    <hr class="mb-0">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <form action="{{route('oda_ara')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">


                <div class="input-group input-group-lg p-0 m-0">
                    <div class="input-group-prepend p-0 m-0">
                        <div class="input-group-text  bg-light border-0"><i class="fab fa-slack-hash"></i></div>
                    </div>
                    <input type="text" name="aranan" class="form-control border-light bg-light pl-0 py-2"
                           placeholder="Kodu buradan aratabilirsin..." aria-label="Recipient's username" style="font-size:17px;"
                           aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <!--  -->
                        <button type="submit" href="" class="btn btn-dark p-2" id="button-addon2" style="font-size:17px;">Oda Ara</button>
                    </div>
                </div>

            </form>
            <hr class="my-0">

        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            <div class="card-body">
                <form action="{{route('oda_olustur')}}" method="post" class="was-validated">


                    <input type="hidden" name="_token" value="{{csrf_token()}}">


                    <div class="input-group p-0 m-0">
                        <div class="input-group-prepend p-0 m-0">
                            <div class="input-group-text  bg-light border-0"><i class="fab fa-slack-hash"></i></div>
                        </div>
                        <input type="text" readonly=""
                               style="font-size:23px; letter-spacing: 8px;font-family: monospace"
                               class="form-control input-group  bg-light border-light" name="oda_kod"
                               value="<?php echo strtoupper(str_random(7)) ?>">
                    </div>


                    <div class="input-group p-0 m-0">
                        <div class="input-group-prepend p-0 m-0">
                            <div class="input-group-text bg-light border-0"><i class="fas fa-map-marker"></i></div>
                        </div>
                        <input type="text" class="form-control input-group  bg-light border-light" name="oda_konum"
                               placeholder=" Konum">
                    </div>

                    <div class="input-group p-0 m-0">
                        <div class="input-group-prepend p-0 m-0">
                            <div class="input-group-text  bg-light border-0"><i class="far fa-edit"></i></div>
                        </div>
                        <textarea type="text" class="form-control input-group  bg-light border-light" name="oda_aciklama"
                                  style="resize:none;" rows="3" placeholder="Açıklama"></textarea>
                    </div>
                    <div><input type="submit" name="odaOlustur" class=" btn btn-dark btn-lg btn-block "
                                value="Oda Oluştur"></div>
                    <hr>


                <!-- eski görünüm

                    <div ><input type="text" readonly="" style="font-size:20px; border-style: none;letter-spacing: 8px;font-family: monospace" name="oda_kod" class="input-group text-center p-1 bg-light border-0"  value="<?php echo strtoupper(str_random(7)) ?>" ></div>
                    <div>
                        <input type="text"  class="input-group bg-light border-0 " name="oda_konum" placeholder="Location" value="" >
                    </div>
                    <div> <textarea class="input-group bg-light border-0 " name="oda_aciklama" id="exampleFormControlTextarea1" style="resize:none;" rows="3" placeholder="Description " required=""></textarea></div>

                    -->
                </form>
            </div>


        </div>

    </div>


@endsection
@section('footer')

    <script>
        setTimeout(function () {
            $('.alert').slideUp(100);

        }, 8000);


    </script>
@endsection
