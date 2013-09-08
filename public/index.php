<?php
/**
 * Website Zend\Together
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * Application setup
 * 
 * @package    Application
 */

// define request microtime
define('REQUEST_MICROTIME', microtime(true));

// define application environment
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// define application path
define('APPLICATION_ROOT', realpath(__DIR__ . '/..'));

// setup autoloading
require_once '../vendor/autoload.php';

// change dir
chdir(dirname(__DIR__));

// get configuration file
switch (APPLICATION_ENV) {
    case 'production':
        $configFile = 'config/production.config.php';
        break;
    case 'development':
    default:
        $configFile = 'config/development.config.php';
        break;
}

// Run the application!
Zend\Mvc\Application::init(include $configFile)->run();
