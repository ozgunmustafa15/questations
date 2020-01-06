<nav class="navbar navbar-expand-lg navbar-light bg-light align-content-center py-1">
    <a class="navbar-brand" href="{{route("anasayfa")}}"><img class="logo" src="{{asset('img/logo1.png')}}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pr-2">


            <li class="nav-item altiCiz">
                <a class="nav-link" href="{{route("iletisim")}}">İletisim</a>
            </li>
            @guest

                <li class="nav-item active altiCiz">
                    <a class="nav-link" href="{{route("kullanici.girisyap")}}">Giris</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route("kullanici.kayitol")}}">Kayit</a>
                </li>
            @endguest
            @auth()
                
                <li class="nav-item dropdown active altiCiz">
                    <a class="nav-link dropdown-toggle" href="{{route('kullanici_sayfasi',Auth::user()->kullanici_adi)}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                        Ara
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form class="form-inline my-2 my-lg-0 mx-1 px-1" action="{{route('kullanici.ara')}}" method="post"  >
                            {{csrf_field()}}

                            <div class="input-group "  style="margin-bottom: 0px;margin-top: 0px; min-width: 250px;">
                                <input type="text" name="aranan" class="form-control " placeholder="Kullanıcı Ara" value="" >
                                <div class="input-group-append"  style="margin-bottom: 0px;margin-top: 0px;" >
                                    <button type="submit" class="btn btn-outline-secondary">Ara</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </li>






                <li class="nav-item dropdown active altiCiz">
                    <a class="nav-link dropdown-toggle" href="{{route('kullanici_sayfasi',Auth::user()->kullanici_adi)}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                        Profil
                    </a>
                    <div class="dropdown-menu px-3" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item "  href="{{route('kullanici_sayfasi',Auth::user()->kullanici_adi)}}">

                            @if(Auth::user()->detay->profil_resmi!=null)
                                <img src="{{ asset('/uploads/kullanici/profilresmi/'.Auth::user()->kullanici_adi.'/'.Auth::user()->detay->profil_resmi) }}" class="rounded-circle mx-2 " style="width: 22px;height: 22px;">
                            @else
                                <img src="{{ asset('/uploads/kullanici/profilresmi/profil.png') }}" class="img-fluid my-2 " style="width: 25px;height: 25px;" >
                            @endif
                            {{ Auth::user()->ad_soyad }}

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()"><i class="fas fa-reply"></i> <small>Oturumu Kapat</small></a>
                        <form id="logout-form" action="{{route('kullanici.oturumukapat')}}" method="post" style="display: none">

                            <div><input type="hidden" name="_token" value="{{csrf_token()}}"></div>

                        </form>
                    </div>
                </li>
                <li class="nav-item active altiCiz">
                    <a class="nav-link" href="{{route("nav-menu")}}">Katıl&Oluştur</a>
                </li>



        </ul>



    </div>


    @endauth()
</nav>
