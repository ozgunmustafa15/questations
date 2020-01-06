@extends('yonetim.layouts.master')
@section('title','Kullanıcı Yönetimi')
@section('content')


    <small class="label label-danger " style="font-size:large;">Kullanıcı Yönetimi</small>





    <div class="panel panel-primary" style="margin-top: 7px;border-color: whitesmoke">
        <div class="panel-heading">

            <form method="post" action="{{route('yonetim.kullanici')}}">
                {{csrf_field()}}

                 <input type="text"  name="aranan"  style="width:40%;padding: 3px;color: black" placeholder="Ara" value="{{old('aranan')}}">
                 <button type="submit" class="btn btn-default btn-sm " >
                      <span class="glyphicon glyphicon-search p-0"></span> Ara
                 </button>
                 <a href="{{route('yonetim.kullanici')}}" class="btn btn-default btn-sm" name="temizle">
                       Temizle
                 </a>
                <a href="{{route('yonetim.kullanici.olustur')}}" class="pull-right btn btn-default btn-sm">Oluştur</a>


            </form>



        </div>
        <div class="panel-body">

            @include('layouts.partials.alert')

            <div class="table-responsive">

                <table class="table table-hover table-borderless">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Resim</th>
                        <th>Kullanıcı Adı</th>
                        <th>Mail</th>
                        <th>Ad Soyad</th>
                        <th>Kayıt Tarihi</th>
                        <th>Durum</th>
                        <th></th>


                    </tr>
                    </thead>
                    <tbody>


                    @foreach($list as $entry)
                        <tr class="{{ $entry->yonetici_mi ? 'bg-warning' : '' }}">
                            <td>{{$entry->id}}</td>

                            <td>
                                @if($entry->detay->profil_resmi)
                                    <img src="{{ asset('/uploads/kullanici/profilresmi/'.$entry->kullanici_adi.'/'.$entry->detay->profil_resmi) }}"  style="width: 22px;height: 22px; border-radius: 100%">
                                @else
                                    <img src="{{ asset('/uploads/kullanici/profilresmi/profil.png') }}"  style="width: 22px;height: 22px; border-radius: 100%">


                                @endif
                            </td>
                            <td>{{$entry->kullanici_adi}}</td>
                            <td>{{$entry->email}}</td>
                            <td>{{$entry->ad_soyad}}</td>
                            <td>{{$entry->olusturulma_tarihi}}</td>
                            <td>
                                @if($entry->aktif_mi)
                                    <span class="label label-success">Aktif</span>
                                @else
                                    <span class="label label-danger">Pasif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('yonetim.kullanici.duzenle',@$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                @if($entry->yonetici_mi==0)
                                    <a href="{{route('yonetim.kullanici.sil',@$entry->id)}}" class="btn btn-xs btn-danger" data-toogle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$list->appends('aranan',old('aranan'))->links()}}            </div>

        </div>
    </div>


@endsection
