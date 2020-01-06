<h1>{{config('app.name')}}</h1>
<h3>Hoşgeldin, {{$kullanici->ad_soyad}}</h3>
<p>Kayıt işlemin başarıyla gerçekleştirildi</p>

<p>Kaydınızı aktifleştirmek için <a href="{{config('app.url')}}/kullanici/aktivasyon/{{$kullanici->aktivasyon_anahtari}}">tıklayın</a>
veya aşağıdaki bağğlantıyı tarayıcınızda açın.
</p>

<p>{{config('app.url')}}/kullanici/aktivasyon/{{$kullanici->aktivasyon_anahtari}}</p>
