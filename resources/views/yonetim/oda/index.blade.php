@extends('yonetim.layouts.master')
@section('title','Oda Yönetimi')
@section('content')

@section('content')
    <small class="label label-danger " style="font-size:large;">Oda Yönetimi</small>
    <div class="panel panel-primary " style="margin-top: 7px ;border-color: whitesmoke">
        <div class="panel-heading">
            <form method="post" action="{{route('yonetim.oda')}}">
                {{csrf_field()}}

                <input type="text"  name="aranan" value="{{old('aranan')}}" style="width:40%;padding: 3px;color: black"  placeholder="Ara">
                <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span> Ara
                </button>
                <a href="{{route('yonetim.oda')}}" class="btn btn-default btn-sm" name="temizle">
                    Temizle
                </a>


            </form>
        </div>
        <div class="panel-body">

            <div class="table-responsive">

                <table class="table table-hover table-borderless">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Oluşturan</th>
                        <th>Kod</th>
                        <th>Katılımcı Sayısı</th>
                        <th>Soru Sayısı</th>
                        <th>Açıklama</th>
                        <th>Durum</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $entry)
                        <tr>

                            <td>{{$entry->id}}</td>
                            <td style="">
                                <a href="{{route('yonetim.oda.duzenle',@$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Detaylar">
                                    <span class="fa fa-pencil">Detay</span>
                                </a>

                            </td>
                            <td>{{'@'.$entry->olusturan_kullanici->kullanici_adi}}</td>
                            <td>{{$entry->oda_kod}}</td>
                            <td>katilimci sayisi</td>
                            <td>sorusayısı</td>
                            <td>
                                @if(strlen($entry->oda_aciklama)>30)

                                   {{$aciklama=substr($entry->oda_aciklama,0,30)}}<a href="{{route('yonetim.oda.duzenle',@$entry->id)}}">...devamını oku</a>
                                @else
                                    {{( $entry->oda_aciklama)}}
                                @endif
                            </td>
                            <td>
                                @if($entry->aktif_mi)
                                    <span class="label label-success">Aktif</span>
                                @else
                                    <span class="label label-danger">Pasif</span>
                                @endif
                            </td>



                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$list->appends('aranan',old('aranan'))->links()}}

            </div>

        </div>
    </div>


@endsection
