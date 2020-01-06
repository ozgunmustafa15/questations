

<div class="list-group">
    <a href="{{route('yonetim.anasayfa')}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Anasayfa</a>

    <a href="{{route('yonetim.kullanici')}}" class="list-group-item">
        <span class="fa fa-users"></span> Kullanıcılar
        <span class="badge badge-dark badge-pill pull-right">{{$istatistikler['kullanicilar']}}</span>
    </a>


    <a href="{{route('yonetim.oda')}}" class="list-group-item">
        <span class="fa fa-table"></span>  Odalar
        <span class="badge badge-dark badge-pill pull-right">{{$istatistikler['odalar']}}</span>
    </a>
    <a href="{{route('yonetim.mesajlar')}}" class="list-group-item">
        <span class="fa fa-table"></span>  Mesajlar
        <span class="badge badge-dark badge-pill pull-right">{{$istatistikler['mesajlar']}}</span>
    </a>




    
</div>
