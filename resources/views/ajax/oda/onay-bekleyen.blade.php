
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