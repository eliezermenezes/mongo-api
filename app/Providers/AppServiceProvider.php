<?php

namespace App\Providers;

use App\Service\AreaService;
use App\Service\EmpresaService;
use App\Service\EnderecoService;
use App\Service\UsuarioService;
use App\Service\VagaService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\IUsuarioService', function () {
            return new UsuarioService();
        });

        $this->app->bind('App\Service\IEnderecoService', function () {
            return new EnderecoService();
        });

        $this->app->bind('App\Service\IEmpresaService', function () {
            return new EmpresaService();
        });

        $this->app->bind('App\Service\IAreaService', function () {
            return new AreaService();
        });

        $this->app->bind('App\Service\IVagaService', function () {
            return new VagaService();
        });
    }

    public function provides()
    {
        return [
            'App\Service\IEnderecoService',
            'App\Service\IUsuarioService',
            'App\Service\IEmpresaService',
            'App\Service\IAreaService',
            'App\Service\IVagaService'
        ];
    }
}