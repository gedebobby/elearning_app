<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GuruRepository;
use App\Repositories\KelasRepository;
use App\Repositories\MapelRepository;
use App\Repositories\SiswaRepository;
use App\Repositories\Interfaces\GuruRepositoryInterface;
use App\Repositories\Interfaces\KelasRepositoryInterface;
use App\Repositories\Interfaces\MapelRepositoryInterface;
use App\Repositories\Interfaces\SiswaRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(SiswaRepositoryInterface::class, SiswaRepository::class);
        $this->app->bind(GuruRepositoryInterface::class, GuruRepository::class);
        $this->app->bind(MapelRepositoryInterface::class, MapelRepository::class);
        $this->app->bind(KelasRepositoryInterface::class, KelasRepository::class);
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
