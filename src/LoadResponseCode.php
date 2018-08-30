<?php

namespace ThemisMin\LaravelApi;


use ArrayAccess;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LoadResponseCode implements ArrayAccess
{
    protected static $instance = null;

    protected $resource = [];

    protected function __construct()
    {
        foreach (Finder::create()->files()->name('*.php')->in(resource_path('response-code')) as $file) {
            /** @var SplFileInfo $file */
            foreach (require $file->getRealPath() as $key => $value) {
                $this->resource[$key] = $value;
            }
        }
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->resource[] = $value;
        } else {
            $this->resource[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->resource[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->resource[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->resource[$offset]) ? $this->resource[$offset] : null;
    }
}
