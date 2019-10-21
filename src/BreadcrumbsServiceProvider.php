<?php

/**
 * BreadcrumbsServiceProvider.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-20
 */

declare(strict_types=1);

namespace Brnbio\LaravelBreadcrumbs;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class BreadcrumbsServiceProvider
 * @package Brnbio\LaravelBreadcrumbs
 */
class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            $this->getConfigFile() => config_path($this->getPackageName() . '.php'),
        ]);
        $this->registerBladeDirectives();
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            $this->getConfigFile(),
            $this->getPackageName()
        );
    }

    /**
     * @return string
     */
    private function getConfigFile(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $this->getPackageName() . '.php';
    }

    /**
     * @return string
     */
    private function getPackageName(): string
    {
        return 'laravel-breadcrumbs';
    }

    /**
     * @return void
     */
    private function registerBladeDirectives(): void
    {
        Blade::directive('breadcrumbs', function (string $expression) {
            return "<?php echo breadcrumbs()->render($expression); ?>";
        });
        Blade::directive('breadcrumb', function (string $expression) {
            return "<?php breadcrumbs()->add($expression); ?>";
        });
    }
}
