<?php
/**
 * Website Zend\Together
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * Application configuration
 * 
 * @package    Application
 */
return array(
    'modules' => array(
        'Application',
        'Blog',
        'User',
//        'Pizza',
        'Comment',
        'SpamCheck',
        'Cms',
//        'Shop',
        'ZendDeveloperTools',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
