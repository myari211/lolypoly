<?php

namespace App\Providers;

use App\Http\View\Composers\LayoutComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

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
        Paginator::defaultView('pagination::default');
        Paginator::defaultSimpleView('pagination::simple-default');
        View::composer('lolypoly.app', LayoutComposer::class);
        View::composer('lolypoly.*', function($view) {
            $public_button = DB::table('10_public_buttons')->get();

            $view->with('public_button', $public_button);
        });
    }
}
