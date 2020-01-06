@if(session()->has('mesaj'))
    <div class="alert alert-{{session('mesaj_tur')}}  pb-0 ">
        <i class="fa fa-info-circle 2x mx-1 mb-1"></i>{{session('mesaj')}}
    </div>
@endif
