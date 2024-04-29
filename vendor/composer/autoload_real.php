<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1a40bb4cf772d00916da5d080ebcf21b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit1a40bb4cf772d00916da5d080ebcf21b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1a40bb4cf772d00916da5d080ebcf21b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1a40bb4cf772d00916da5d080ebcf21b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
