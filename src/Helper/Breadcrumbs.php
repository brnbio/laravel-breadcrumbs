<?php

/**
 * Breadcrumbs.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-10-14
 */

declare(strict_types=1);

namespace Brnbio\LaravelBreadcrumbs\Helper;

use Brnbio\LaravelBreadcrumbs\Template\Bootstrap4;
use Exception;
use Illuminate\Support\HtmlString;

/**
 * Class Helper
 * @package Brnbio\LaravelBreadcrumbs\Helper
 */
class Breadcrumbs
{
    public const TEMPLATE_BOOTSTRAP4 = 'bootstrap4';

    /**
     * @var Breadcrumbs
     */
    protected static $instance;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @return Breadcrumbs
     */
    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param string $name
     * @param string|null $url
     * @param array $options
     * @return $this
     */
    public function add(string $name, string $url = null, array $options = []): self
    {
        $options = $this->getAddOptions($options);
        $item = [
            'name' => e($name),
            'url' => $url ? url($url) : null,
        ];

        if ($options['prepend']) {
            array_unshift($this->items, $item);
        } else {
            array_push($this->items, $item);
        }

        return $this;
    }

    /**
     * @param string $name
     * @param string $url
     * @return $this
     */
    public function prepend(string $name, string $url): self
    {
        return $this->add($name, $url, [
            'prepend' => true,
        ]);
    }

    /**
     * @return $this
     */
    public function reset(): self
    {
        $this->items = [];

        return $this;
    }

    /**
     * @param string|null $template
     * @return HtmlString
     * @throws Exception
     */
    public function render(string $template = null): HtmlString
    {
        if ($template === null) {
            $template = config('laravel-breadcrumbs.template');
        }

        switch ($template) {
            case self::TEMPLATE_BOOTSTRAP4:
                $template = new Bootstrap4();
                break;
            default:
                throw new Exception('Breadcrumbs template ' . e($template) . ' not supported.');
                break;
        }


        return $template->render($this->items);
    }

    /**
     * @param array $options
     * @return array
     */
    private function getAddOptions(array $options = []): array
    {
        return $options + [
            'prepend' => false,
        ];
    }
}
