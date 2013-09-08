<?php
/**
 * Website Zend\Together
 *
 * @package    Cms
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * Cms module configuration
 * 
 * @package    Cms
 */
return array(
    'router' => array(
        'routes' => array(
            'cms' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/cms[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'cms',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    'controllers' => array(
        'factories' => array(
            'cms' => 'Cms\Controller\CmsControllerFactory',
        ),
    ),
    
    'service_manager' => array(
        'invokables' => array(
            'Cms\Service\Cms' => 'Cms\Service\CmsService',
        ),
    ),
    
    'view_helpers' => array(
        'factories'=> array(
            'CmsContentBlock' => 'Cms\View\Helper\CmsContentBlockFactory',
        ),
    ),
    
    'acl' => array(
        'admin'   => array(
            'cms' => array('allow' => null),
        ),
    ),
);
