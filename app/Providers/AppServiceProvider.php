<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\{Blade, Schema};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Mengatur default string
	    Schema::defaultStringLength(191);
        // Mengatur zona waktu websiite
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        // Membuat format rupiah
        Blade::directive('rupiah', function ( $expression ) {
            return "<?php echo number_format($expression,2,',','.'); ?>";
        });
        // versi 2
        Blade::directive('rupiahv2', function ( $expression ) {
            return "<?php echo number_format($expression,0,',','.'); ?>";
        });
        Blade::directive('greeting', function ($expression) {
            return "<?php
            if ($expression > '00:01' && $expression < '10:00') {
                echo 'Selamat Pagi';
            } elseif ($expression >= '10:00' && $expression < '14:00') {
                echo 'Selamat Siang';
            } elseif ($expression <= '18:00') {
                echo 'Selamat Sore';
            } else {
                echo 'Selamat Malam';
            }
            ?>";
        });
    }
}
