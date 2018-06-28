<?php
namespace MarcosDantas\LaravelValidationBundle;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

class ValidationFactory extends Factory
{

    /**
     * @var Factory
     */
    private static $instance;
    /**
     * Set as global scope functionality
     */
    public function setAsGlobal()
    {
        self::$instance = $this;
    }
    /**
     * @param $name
     * @param $arguments
     * @return Factory
     */
    public static function __callStatic($name, $arguments)
    {
        return self::$instance;
    }
}
