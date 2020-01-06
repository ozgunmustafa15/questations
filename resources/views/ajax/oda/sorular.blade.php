
@foreach($sorular->where('aktif_mi', 1) as $soru)
    <hr class="p-0 mb-1 mt-0">
    <h5><small class="badge {{$soru->kullanici_id == $oda->olusturan_kullanici->id ? 'badge-danger' : 'badge-info' }}">{{'@'.$soru->kullanici->kullanici_adi}}</small></h5>
    <h4>{{$soru->kullanici->ad_soyad}}</h4>
    <ul style="list-style-position: outside;">
        <li style="font-family: 'Roboto', sans-serif; font-size: 25px!important;" class="m-3">
            <p class="small">{{ $soru->soru_detay }}</p>
        </li>
        <footer class="blockquote-footer badge badge-light">Oluşturulma Tarihi <cite title="Source Title">{{ $soru->olusturulma_tarihi }}</cite></footer>

    </ul>
    <hr class="p-0 mb-1 mt-0">
@endforeach
