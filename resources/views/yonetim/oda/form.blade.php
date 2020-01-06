@extends('yonetim.layouts.master')
@section('title','Oda Yönetimi')
@section('content')
    <form  method="post" action="{{route('yonetim.oda.kaydet',@$entry->id)}}">
        {{csrf_field()}}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$entry-> id > 0 ? "Guncelle":"Kaydet"}}
            </button>

        </div>
        <h3 class="sub-header" id="email">Oda Düzenle
            <small>(arkaplanı yeşil olanlar onaylanmış sorulardır.)</small>
        </h3>


        @include('layouts.partials.errors')
        @include('layouts.partials.alert')


        <div class="d-md-flex h-md-100 align-items-center">


            <div class="col-md-8 p-0 bg-indigo h-md-100 ">
                <div class="d-md-flex  h-md-100 p-5 justify-content-center">
                    <div class="logoarea pt-5 pb-5">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <small class="label label-danger p-2 m-2">{{$entry->oda_kod}}</small>
                                <small class="label label-danger p-2 m-2">{{'@'.$entry->olusturan_kullanici->kullanici_adi}}</small>

                                    <label class="pull-right " style="color: black!important;">
                                        <input type="checkbox"  name="aktif_mi" value="1" {{$entry->aktif_mi ? 'checked':''}}>Aktif mi?
                                    </label>


                            </div>
                            <div class="panel-body" style=" overflow: auto;">


                                <div class="col">
                                    <div class="form-group">
                                        <strong>Oda açıklama:</strong> {{$entry->oda_aciklama}}

                                        @if(count($sorular)<1)
                                            <div class="bg bg-alert">
                                                <h4>Bu odada hiç soru sorulmamış.</h4>
                                            </div>
                                        @endif

                                        @foreach($sorular as $soru)

                                            <div class="{{$soru->aktif_mi==1?'bg-success':'bg-danger'}} " style="border-radius: 20px">

                                        <h5>
                                            <small class=" label {{$soru->kullanici_id == $oda->olusturan_kullanici->id ? 'label-danger' : 'label-info' }} p-2 m-2">{{'@'.$soru->kullanici->kullanici_adi}}</small>
                                        </h5>
                                            <h4>{{$soru->kullanici->ad_soyad}}</h4>


                                        <ul class="  " style="list-style-position: outside; ">
                                            <li>{{ $soru->soru_detay }}</li>
                                            <footer class="m-2 blockquote-footer badge badge-light text-muted">Oluşturulma Tarihi <cite title="Source Title">{{ $soru->olusturulma_tarihi }}</cite></footer>

                                        </ul>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>


                                <div class="col">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="col-md-4 p-0 h-md-100 loginarea  ">
                <div class=" d-md-flex align-items-center h-md-100 p-5 justify-content-center ">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <span class="label label-primary p-2 m-2">Odadaki Kullanıcılar</span>
                        </div>
                        <div class="panel-body" style="overflow: auto;" >
                            <div >
                                <div class="list-group">

                                    @foreach($katilanlar as $katilan)
                                        <a href="{{route('yonetim.kullanici.duzenle',$katilan->kullanici->id)}}" class="list-group-item {{$entry->olusturan_kullanici->kullanici_adi==$katilan->kullanici->kullanici_adi? 'active':''}} " title="düzenle">
                                            {{'@'.$katilan->kullanici->kullanici_adi}} |
                                            <strong>{{$katilan->kullanici->ad_soyad}}</strong>
                                        </a>
                                    @endforeach

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
