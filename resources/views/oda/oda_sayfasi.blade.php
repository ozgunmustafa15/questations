@extends('layouts.master')
@section('title','Oda')

@section('head')


    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>
        var auto_refresh=setInterval(
            $(document).ready(function () {
                $(".sonuc").load('{{url('ajax/oda/sorular/'.$oda->oda_kod)}}').fadeIn("slow");
            }),7000);
    </script>

    <script>
        var auto_refresh=setInterval(
            function () {
                $(".sonuc").load('{{url('ajax/oda/sorular/'.$oda->oda_kod)}}').fadeIn("slow");
            },7000);
    </script>
    
    <script>
        var auto_refresh=setInterval(
            $(document).ready(function () {
                $("#onay-bekleyen").load('{{url('ajax/oda/onay-bekleyen/'.$oda->oda_kod)}}').fadeIn("slow");
            }),7000);
    </script>

    <script>
        var auto_refresh=setInterval(
            function () {
                $("#onay-bekleyen").load('{{url('ajax/oda/onay-bekleyen/'.$oda->oda_kod)}}').fadeIn("slow");
            },7000);
    </script>

@endsection
@section('content')

    <div class="card border-0 pt-0 " >
        <div class="card-header bg-transparent pt-1 px-auto my-1">

            <div style="font-family: 'Roboto Mono', monospace;font-size: 60px;" class="text-center ">{{ $oda->oda_kod }}</div>

            <div class="" style="font-family: 'Roboto Condensed', sans-serif; font-size: 20px;">
                <div class="pt-1 profil-kucuk"><i class="fas fa-user mx-1"></i>&emsp;{{ $oda->olusturan_kullanici->ad_soyad }}</div>
                <div class="pt-1 mx-1 profil-kucuk"><i class="fas fa-map-marker-alt "></i>&emsp; &nbsp;{{ $oda->oda_konum }}</div>
                <div class="pt-1 mx-1 profil-kucuk"><i class="far fa-edit "></i>&emsp;{{ $oda->oda_aciklama }}  </div>

            </div>
            <div class="mt-2">
                <div class="row mt-2 text-right">

                    @if (auth()->id() == $oda->olusturan_kullanici->id)
                        <div class="col p-0 ">
                            <a href="{{ route('oda.kapat', $oda->oda_kod) }}" class="btn btn-xs btn-danger p-1 mx-3" name="odaKapat">
                                <img src="{{asset('img/door2.png')}}">Odayı Kapat</a>
                        </div>
                    @else
                        <div class="col p-0">
                            <a href="{{ route('oda.cik', $oda->oda_kod) }}" class="btn btn-xs btn-danger p-1 mx-3" name="odaCik">
                                <img src="{{asset('img/door2.png')}}">Odadan Çık</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if (auth()->id() == $oda->olusturan_kullanici->id)
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="font-size: 13px;">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-onaylananlar" role="tab" aria-controls="nav-home" aria-selected="true">Onaylananlar</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-onay-bekleyen" role="tab" aria-controls="nav-profile" aria-selected="false">Onay Bekleyen</a>
                    <a class="nav-item nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="false"> Odadakiler<span class="badge badge-danger mt-0">{{$katilan_sayisi}}</span> </a>
                </div>
            </nav>


            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-onaylananlar" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card-body p-0 mt-2" id="sonuc" style="margin-bottom: 30px;">
                        <hr class="p-0 mb-1 mt-0">

                        <div class="col">
                            <div class="form-group sonuc"  id="sonuc">




                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-onay-bekleyen" role="tabpanel" aria-labelledby="nav-profile-tab" >

                    <div class="col mt-1" style="margin-bottom: 40px; ">
                        <div class="form-group" id="onayB">

                            @foreach($sorular->where('aktif_mi', 0) as $soru)
                                <small class="badge {{$soru->kullanici_id == $oda->olusturan_kullanici->id ? 'badge-danger' : 'badge-info' }}">{{'@'.$soru->kullanici->kullanici_adi}}</small>
                                <ul style="list-style-position: outside;">
                                    <li style="font-family: 'Roboto Condensed', sans-serif;" class="m-3">{{ $soru->soru_detay }}</li>
                                    <footer class="blockquote-footer text-muted badge badge-light">Oluşturulma Tarihi <cite title="Source Title">{{ $soru->olusturulma_tarihi }}</cite></footer>

                                </ul>

                                <div class="card-footer m-0 p-0">
                                    <div class="row m-0">
                                        <div class="col-6 p-1">
                                            <a href="{{ route('soru.onayla', ['soru_id'=> $soru->id, 'durum' => 1]) }}" class="btn btn-info btn-sm btn-block"><i class="fas fa-check fa-lg"></i></a></div>
                                        <div class="col-6 p-1">
                                            <a href="{{ route('soru.onayla', ['soru_id'=> $soru->id, 'durum' => 0]) }}" class="btn btn-danger btn-sm btn-block"><i class="fas fa-times-circle fa-lg"></i></a></div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>






                <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                    @foreach($katilanlar->where('kullanici_id', '<>', $oda->olusturan_kullanici_id) as $katilan)
                        <div class="card m-0 mt-1 pl-1 pr-1 border-0">
                            <div class="card-body p-1">
                                <h5><small class="badge badge-info">{{'@'. $katilan->kullanici->kullanici_adi }}</small></h5>


                            </div>


                        </div>
                    @endforeach

                </div>
            </div>

        @endif

        @if (auth()->id() != $oda->olusturan_kullanici->id)

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="font-size: 13px;">
                    <a class="nav-item nav-link active" id="nav-sorular-tab" data-toggle="tab" href="#nav-sorular" role="tab" aria-controls="nav-home" aria-selected="true">Sorular</a>
                    <a class="nav-item nav-link" id="nav-users2-tab" data-toggle="tab" href="#nav-users2" role="tab" aria-controls="nav-users2" aria-selected="false">Odadakiler<span class="badge badge-danger mt-0">{{$katilan_sayisi}}</span></a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-sorular" role="tabpanel" aria-labelledby="nav-sorular-tab">

                    <div class="col mt-1" style="margin-bottom: 30px;">
                        <div class="form-group sonuc">

                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="nav-users2" role="tabpanel" aria-labelledby="nav-users2-tab">
                    @foreach($katilanlar as $katilan)
                        <div class="card m-0 mt-1 pl-1 pr-1 border-0">
                            <div class="card-body p-1">
                                <h5><small class="badge badge-info">{{'@'. $katilan->kullanici->kullanici_adi }}</small></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif




        <div class="container card-footer bg-light fixed-bottom p-1 pb-0">
            <div class="input-group p-0 m-0">
                <textarea id="mesaj" class="form-control bg-white border border-white" style="resize:none; border-bottom-left-radius: 25px;border-top-left-radius: 25px; " rows="2" placeholder="Yanıtla..." aria-describedby="basic-addon2"></textarea>
                <div class="input-group-append ">
                    <button class="btn btn bg-white" name="btnGonder" id="btnGonder"
                            style="border-bottom-right-radius: 25px;border-top-right-radius: 25px;border-bottom-left-radius: 0px;border-top-left-radius: 0px;" >
                        <i class="fas fa-paper-plane pl-3 pr-4 golge-icon" style=""></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('footer')
    <script>
    $(function() {

        $('#btnGonder').click(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('oda.soruolustur') }}",
                type: "post",
                data: { oda_id: '{{ $oda->id }}', soru_detay: $('#mesaj').val() },
                success: function (response) {
                    console.log(response);
                    $('#mesaj').val('');
                    alert('Gönderildi!'); // toastr ile yapılabilir
                    //location.reload();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    //alert('Hata Oluştu!');
                    //location.reload();
                }
            });
        });

    });
    </script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>


@endsection
