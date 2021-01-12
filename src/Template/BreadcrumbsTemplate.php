<?php

/**
 * BreadcrumbsTemplate.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-10-14
 */

declare(strict_types=1);

namespace Brnbio\LaravelBreadcrumbs\Template;

use Illuminate\Support\HtmlString;

/**
 * Interface TemplateInterface
 * @package Brnbio\LaravelBreadcrumbs\Template
 */
class BreadcrumbsTemplate
{
    /**
     * @param array $items
     * @return HtmlString
     */
    public function render(array $items = []): HtmlString
    {
        foreach ($items as &$item) {
            $template = $item['url'] ? $this->getBreadcrumbItemTemplate() : $this->getBreadcrumbActiveItemTemplate();
            $item = $this->replacePlaceholders($item, $template);
        }
        $breadcrumbs = str_replace('{items}', implode('', $items), $this->getBreadcrumbsTemplate());

        return new HtmlString($breadcrumbs);
    }

    /**
     * @return string
     */
    protected function getBreadcrumbsTemplate(): string
    {
        return '<ul>{items}</ul>';
    }

    /**
     * @return string
     */
    protected function getBreadcrumbItemTemplate(): string
    {
        return '<a href="{url}">{name}</a>';
    }

    /**
     * @return string
     */
    protected function getBreadcrumbActiveItemTemplate(): string
    {
        return '<span class="active">{name}</span>';
    }

    /**
     * @param array $item
     * @param string $content
     * @return string
     */
    private function replacePlaceholders(array $item, string $content): string
    {
        foreach ($item as $key => $value) {
            if (is_string($value)) {
                $content = str_replace('{' . $key . '}', $value, $content);
            }
        }

        return $content;
    }
}
