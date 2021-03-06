<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2ac9c5625680c17adc4e27cfef7f32d4
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sabre\\Event\\' => 12,
        ),
        'I' => 
        array (
            'Infra\\Ioc\\' => 10,
            'Infra\\Data\\' => 11,
        ),
        'D' => 
        array (
            'Domain\\' => 7,
            'Dice\\' => 5,
        ),
        'A' => 
        array (
            'Application\\' => 12,
            'Api\\Rest\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sabre\\Event\\' => 
        array (
            0 => __DIR__ . '/..' . '/sabre/event/lib',
        ),
        'Infra\\Ioc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/3-Infra/3.2-CrossCutting',
        ),
        'Infra\\Data\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/3-Infra/3.1-Data',
        ),
        'Domain\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/2-Domain',
        ),
        'Dice\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/3-Infra/3.2-CrossCutting/Dice',
        ),
        'Application\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/1-Application',
        ),
        'Api\\Rest\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/0-Presentation/Rest',
        ),
    );

    public static $prefixesPsr0 = array (
        'V' => 
        array (
            'Valitron' => 
            array (
                0 => __DIR__ . '/..' . '/vlucas/valitron/src',
            ),
        ),
        'S' => 
        array (
            'Spot' => 
            array (
                0 => __DIR__ . '/..' . '/vlucas/spot2/lib',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\DBAL\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/dbal/lib',
            ),
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
            'Doctrine\\Common\\Collections\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/collections/lib',
            ),
            'Doctrine\\Common\\Cache\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/cache/lib',
            ),
            'Doctrine\\Common\\Annotations\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/annotations/lib',
            ),
            'Doctrine\\Common\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/common/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2ac9c5625680c17adc4e27cfef7f32d4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2ac9c5625680c17adc4e27cfef7f32d4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit2ac9c5625680c17adc4e27cfef7f32d4::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
