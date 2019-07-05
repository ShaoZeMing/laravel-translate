<?php
namespace ShaoZeMing\LaravelCrypt;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use ShaoZeMing\Crypt\CryptService;

/**
 * Class CryptServiceProvider
 * @package Shaozeming\crypt
 */
class CryptServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $source = realpath(dirname(__DIR__).'/config/crypt.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('crypt.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('crypt');
        }
        $this->mergeConfigFrom($source, 'crypt');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CryptService::class, function ($app) {
            return new CryptService($app->config->get('crypt', []));
        });
        $this->app->alias(CryptService::class, 'crypt');

    }

    public function provides()
    {
        return [CryptService::class,'crypt'];
    }
}
