<?php
namespace MarcosDantas\LaravelValidationBundle;

use Illuminate\Validation\Factory;

class Validate extends Factory
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
