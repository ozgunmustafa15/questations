@extends('yonetim.layouts.master')
@section('title','Anasayfa Admin')
@section('content')

    <h1 class="page-header">Dashboard</h1>

    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Kullanıcılar</div>
                <div class="panel-body">
                    <div class="d-md-flex h-md-100 align-items-center">

                        <!-- First Half -->

                        <div class="col-xs-6 p-0 bg-indigo h-md-100">
                            <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
                                <div class="logoarea pt-5 pb-5">
                                    <h4>{{$istatistikler['kullanici_aktif']}}</h4>
                                    <p>Aktif</p>
                                </div>
                            </div>
                        </div>

                        <!-- Second Half -->

                        <div class="col-xs-6 p-0 bg-white h-md-100 loginarea">
                            <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
                                <h4>{{$istatistikler['kullanici_pasif']}}</h4>
                                <p>Pasif</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Odalar</div>
                <div class="panel-body">
                    <div class="d-md-flex h-md-100 align-items-center">

                        <!-- First Half -->

                        <div class="col-xs-6 p-0 bg-indigo h-md-100">
                            <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
                                <div class="logoarea pt-5 pb-5">
                                    <h4>{{$istatistikler['oda_aktif']}}</h4>
                                    <p>Aktif</p>
                                </div>
                            </div>
                        </div>

                        <!-- Second Half -->

                        <div class="col-xs-6 p-0 bg-white h-md-100 loginarea">
                            <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
                                <h4>{{$istatistikler['oda_pasif']}}</h4>
                                <p>Pasif</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Sorular</div>
                <div class="panel-body">
                    <div class="d-md-flex h-md-100 align-items-center">

                        <!-- First Half -->

                        <div class="col-xs-6 p-0 bg-indigo h-md-100">
                            <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
                                <div class="logoarea pt-5 pb-5">
                                    <h4>{{$istatistikler['soru_aktif']}}</h4>
                                    <p>Aktif</p>
                                </div>
                            </div>
                        </div>

                        <!-- Second Half -->

                        <div class="col-xs-6 p-0 bg-white h-md-100 loginarea">
                            <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
                                <h4>{{$istatistikler['soru_pasif']}}</h4>
                                <p>Pasif</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>























    </section>


@endsection
