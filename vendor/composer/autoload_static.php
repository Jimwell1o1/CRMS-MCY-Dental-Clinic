<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc85bcc9497cec3a077d5611680a22d44
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc85bcc9497cec3a077d5611680a22d44::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc85bcc9497cec3a077d5611680a22d44::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc85bcc9497cec3a077d5611680a22d44::$classMap;

        }, null, ClassLoader::class);
    }
}
