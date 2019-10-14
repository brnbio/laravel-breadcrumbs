<?php

/**
 * helpers.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-10-14
 */

declare(strict_types=1);

use Brnbio\LaravelBreadcrumbs\Helper\Breadcrumbs as BreadcrumbsHelper;

if (! function_exists('breadcrumbs')) {
    /**
     * @return BreadcrumbsHelper
     */
    function breadcrumbs(): BreadcrumbsHelper
    {
        return BreadcrumbsHelper::getInstance();
    }
}
