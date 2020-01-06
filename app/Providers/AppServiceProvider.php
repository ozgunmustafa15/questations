<?php

namespace App\Providers;

use App\Models\Kullanici;
use App\Models\Soru;
use App\Models\Iletisim;
use App\Oda;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $istatistikler=[
            'mesajlar'=>Iletisim::count(),
            'kullanicilar'=>Kullanici::count(),
            'kullanici_aktif'=>Kullanici::where('aktif_mi',1)->count(),
            'kullanici_pasif'=>Kullanici::where('aktif_mi',0)->count(),

            'odalar'=>Oda::count(),
            'oda_aktif'=>Oda::where('aktif_mi',1)->count(),
            'oda_pasif'=>Oda::where('aktif_mi',0)->count(),

            'soru_aktif'=>Soru::where('aktif_mi',1)->count(),
            'soru_pasif'=>Soru::where('aktif_mi',0)->count()
        ];
        View::share('istatistikler',$istatistikler);





    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
