<?php

namespace ThemisMin\LaravelApi;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LaravelApiServiceProvider extends ServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $configSource = realpath(__DIR__ . '/config.php');

        $this->publishes([$configSource => config_path('laravel-api.php')]);

        $this->mergeConfigFrom($configSource, 'laravel-api');

        $resourcePath = realpath(__DIR__ . '/resource/');

        foreach (Finder::create()->files()->name('*.php')->in($resourcePath) as $file) {
            /** @var SplFileInfo $file */
            $this->publishes([$file->getPathname() => resource_path($file->getRelativePathname())]);
        }
    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->setupConfig();

        JsonResponse::macro('apiJson', function ($code = 200) {

            $response = [
                'code' => $code,
                'status' => response_code($code, 'status', 'success'),
                'message' => response_code($code, 'message', 'success'),
                'data' => $this->getData(true)
            ];
            return new JsonResponse($response, response_code($code, 'status_code', $code));
        });
    }

}
