<?php

namespace ThemisMin\LaravelApi;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
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
        // 获取 config.php 的实际路径
        $configSource = realpath(__DIR__ . '/config.php');

        // 将 config.php 发布到 config_path('laravel-api.php')
        $this->publishes([$configSource => config_path('laravel-api.php')]);

        // 合并 config.php 的配置
        $this->mergeConfigFrom($configSource, 'laravel-api');

        // 获取 resource 目录的实际路径
        $resourcePath = realpath(__DIR__ . '/resource/');

        // 遍历 resource 目录下的所有 php 文件，并将它们发布到 resource_path 下
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
        // 注册配置
        $this->setupConfig();

        // JsonResponse::macro('apiJson', function ($code = 200, $header = []) {
        //     $responseCode = response_code($code);
        //     unset($responseCode['code']);
        //     unset($responseCode['http_code']);
        //
        //     $response = array_merge(
        //         ['code' => $code],
        //         $responseCode,
        //         ['data' => $this->getData(true)]
        //     );
        //
        //     return new JsonResponse($response, response_code($code, 'http_code', 200), $header);
        // });
    }

}
