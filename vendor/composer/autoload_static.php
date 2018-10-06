<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7f184a15db20e222227578525c2cf06a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7f184a15db20e222227578525c2cf06a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7f184a15db20e222227578525c2cf06a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
