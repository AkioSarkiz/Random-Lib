<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitadc285384a0a61bb0b869640ab8e7368
{
    public static $classMap = array (
        'Random\\Random' => __DIR__ . '/../..' . '/src/Random.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitadc285384a0a61bb0b869640ab8e7368::$classMap;

        }, null, ClassLoader::class);
    }
}
