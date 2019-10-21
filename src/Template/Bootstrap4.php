<?php

/**
 * Bootstrap4.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-10-14
 */

declare(strict_types=1);

namespace Brnbio\LaravelBreadcrumbs\Template;

/**
 * Class Bootstrap4
 * @package Brnbio\LaravelBreadcrumbs\Template
 */
class Bootstrap4 extends BreadcrumbsTemplate
{
    /**
     * @return string
     */
    protected function getBreadcrumbsTemplate(): string
    {
        return '<nav aria-label="breadcrumb"><ol class="breadcrumb">{items}</ol></nav>';
    }

    /**
     * @return string
     */
    protected function getBreadcrumbItemTemplate(): string
    {
        return '<li class="breadcrumb-item"><a href="{url}">{name}</a></li>';
    }

    /**
     * @return string
     */
    protected function getBreadcrumbActiveItemTemplate(): string
    {
        return '<li class="breadcrumb-item active" aria-current="page">{name}</li>';
    }
}
