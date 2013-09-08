<?php
/**
 * Website Zend\Together
 *
 * @package    SpamCheck
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * SpamCheck module configuration
 * 
 * @package    SpamCheck
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'SpamCheck\Service\B8' => 'SpamCheck\Service\B8ServiceFactory',
        ),
    ),
    
    'controller_plugins' => array(
        'factories'=> array(
            'SpamCheck' => 'SpamCheck\Controller\Plugin\SpamCheckFactory',
        ),
    ),
    
    'view_helpers' => array(
        'factories'=> array(
            'SpamCheck' => 'SpamCheck\View\Helper\SpamCheckFactory',
        ),
    ),

    'translator'      => array(
        'locale'                    => 'de',
        'translation_file_patterns' => array(
            array(
                'type'        => 'phpArray',
                'base_dir'    => realpath(__DIR__ . '/../language'),
                'pattern'     => '%s.php',
                'text_domain' => 'default',
            ),
        ),
    ),

    'b8' => array(
        'config_b8' => array(
            'storage' => 'mysql',
            'rob_x'   => 0.5,
        ),
        'config_database' => array(
            'table_name' => 'b8_wordlist',
        ),
    ),
);
