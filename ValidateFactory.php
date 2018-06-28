<?php
namespace MarcosDantas\LaravelValidationBundle;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

class ValidateFactory
{
    public static function createValidation(string $locale = 'pt-BR')
    {
        $translator = new Translator(
            new FileLoader(
                new Filesystem(),
                __DIR__.'/../lang'
            ),
            $locale
        );
        $validation = new Validate($translator, null);
        $validation->setAsGlobal();
        return $validation;
    }
}
