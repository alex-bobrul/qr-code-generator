<?php

namespace App\Providers;

use App\Repositories\{
    Eloquent\QRCodeRepository,
    QrCodeRepositoryInterface
};
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
        $this->app->bind(
            QrCodeRepositoryInterface::class,
            QRCodeRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
