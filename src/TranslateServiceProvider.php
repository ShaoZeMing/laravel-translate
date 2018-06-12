<?php
namespace ShaoZeMing\LaravelTranslate;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use ShaoZeMing\Translate\TranslateService;

/**
 * Class TranslateServiceProvider
 * @package Shaozeming\translate
 */
class TranslateServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $source = realpath(dirname(__DIR__).'/config/translate.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('translate.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('translate');
        }
        $this->mergeConfigFrom($source, 'translate');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TranslateService::class, function ($app) {
            return new TranslateService($app->config->get('translate', []));
        });
        $this->app->alias(TranslateService::class, 'translate');

    }

    public function provides()
    {
        return [TranslateService::class,'translate'];
    }
}
