<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdaaddd25246548abf05db0c9af08fac8
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpAmqpLib\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdaaddd25246548abf05db0c9af08fac8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdaaddd25246548abf05db0c9af08fac8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
