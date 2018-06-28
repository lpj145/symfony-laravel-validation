<?php
namespace MarcosDantas\LaravelValidationBundle\DependencyInjection;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use MarcosDantas\LaravelValidationBundle\ValidationFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class LaravelValidationExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $locale = $container->getParameter('locale_validation') ?? 'pt-BR';

        $translator = new Translator(
            new FileLoader(
                new Filesystem(),
                __DIR__.'/../lang'
            ),
            $locale
        );
        $validation = new ValidationFactory($translator, $container);
        $validation->setAsGlobal();
        $container->set(Factory::class, $validation);
    }

}
