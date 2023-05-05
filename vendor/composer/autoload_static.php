<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit89eca7d75c2c1414fc8fc57489abb2af
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit89eca7d75c2c1414fc8fc57489abb2af::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit89eca7d75c2c1414fc8fc57489abb2af::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit89eca7d75c2c1414fc8fc57489abb2af::$classMap;

        }, null, ClassLoader::class);
    }
}
