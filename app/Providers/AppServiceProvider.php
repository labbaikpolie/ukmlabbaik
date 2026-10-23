<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\View\Composers\AdminLayoutComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {
        View::composer('admin.layouts.main', AdminLayoutComposer::class);

        // Set locale Carbon ke Bahasa Indonesia
        setlocale(LC_TIME, 'id_ID.UTF-8');
        Carbon::setLocale('id');
    }
}