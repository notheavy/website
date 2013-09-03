<?php
/**
 * Website Zend\Together
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * Global configuration
 * 
 * @package    Application
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),

    // Es wird eine MySQL Datenbank benötigt, deren Daten hier einzutragen sind.
    // DB Dump ist unter /data/db/mysql.dump.sql zu finden
    'db' => array(
        'driver'    => 'Pdo_Mysql',
        'dsn'       => 'mysql:dbname=zftogether;host=localhost;charset=utf8',
        'user'      => 'zend',
        'pass'      => 'together'
    ),

    // Für den B8 Filter wird eine MySQL Datenbank benötigt, deren Daten hier einzutragen sind.
    // DB Dump ist unter /module/SpamCheck/vendor/b8/install zu finden
    'b8' => array(
        'config_database' => array(
            'database'   => 'zftogether',
            'host'       => 'localhost',
            'user'       => 'zend',
            'pass'       => 'together',
        ),
    ),
);
