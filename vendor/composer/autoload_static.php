<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit49a297f61c8ab19d52ccaceaa888872e
{
    public static $classMap = array (
        'AjaxController' => __DIR__ . '/../..' . '/app/controllers/AjaxController.php',
        'App' => __DIR__ . '/../..' . '/core/App.php',
        'BackendController' => __DIR__ . '/../..' . '/app/controllers/BackendController.php',
        'ComposerAutoloaderInit49a297f61c8ab19d52ccaceaa888872e' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit49a297f61c8ab19d52ccaceaa888872e' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/connection.php',
        'Helper' => __DIR__ . '/../..' . '/core/Helper.php',
        'LoginController' => __DIR__ . '/../..' . '/app/controllers/LoginController.php',
        'Mail' => __DIR__ . '/../..' . '/core/Mail.php',
        'PHPMailer' => __DIR__ . '/../..' . '/core/phpMailer/class.phpmailer.php',
        'PagesController' => __DIR__ . '/../..' . '/app/controllers/PagesController.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/queryBuilder.php',
        'Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Router' => __DIR__ . '/../..' . '/core/Router.php',
        'SMTP' => __DIR__ . '/../..' . '/core/phpMailer/class.smtp.php',
        'User' => __DIR__ . '/../..' . '/core/User.php',
        'phpmailerException' => __DIR__ . '/../..' . '/core/phpMailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit49a297f61c8ab19d52ccaceaa888872e::$classMap;

        }, null, ClassLoader::class);
    }
}
