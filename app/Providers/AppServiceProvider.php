<?php

namespace App\Providers;

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
       View::share('prefix', $this->urlFixer());
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

    /**
     * [urlFixer description]
     * Si estamos en el servidor de produccion, le agregamos a la url la siguiente ruta
     * @return [type] [description]
     */
    private function urlFixer() {
        return request()->server('SERVER_ADDR') == '132.247.147.90' ? '/mussi/public' : '';
    }
}
