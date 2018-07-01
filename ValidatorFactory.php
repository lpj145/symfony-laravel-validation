<?php
namespace MarcosDantas\LaravelValidationBundle;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation as Translation;
use Illuminate\Validation\Factory;

class ValidatorFactory
{
    protected static function loadTranslator(string $locale): Translation\Translator
    {
        $fileSystem = new Filesystem();
        $loader = new Translation\FileLoader(
            $fileSystem,
            self::getLocalePath()
        );

        $loader->addNamespace('lang', self::getLocalePath());
        $loader->load($locale, 'validation', 'lang');


        return new Translation\Translator($loader, $locale);
    }

    protected static function getLocalePath()
    {
        return dirname(__FILE__).'/lang';
    }

    protected static function getFactory(string $locale)
    {
        return self::addExtensions(new Factory(self::loadTranslator($locale)));
    }

    protected static function addExtensions(Factory $factory)
    {
        return $factory;
    }

    public static function factoryValidator(string $locale = 'pt-BR')
    {
        return self::getFactory($locale);
    }

    public function createValidator(string $locale = 'pt-BR')
    {
        return self::factoryValidator($locale);
    }
}
