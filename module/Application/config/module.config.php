<?php
/**
 * Website Zend\Together
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * Application module configuration
 * 
 * @package    Application
 */
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:controller[/:action[/:page]]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'page'       => '[0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'index',
                        'action'     => 'index',
                        'page'       => '1',
                    ),
                ),
            ),
        ),
    ),
    
    'controllers' => array(
        'invokables' => array(
            'index'   => 'Application\Controller\IndexController',
            'listing' => 'Application\Controller\ListingController',
            'about'   => 'Application\Controller\AboutController',
        ),
    ),
    
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory'
        ),
    ),
    
    'filters' => array(
        'invokables'=> array(
            'stringToUrl'        => 'Application\Filter\StringToUrl',
            'stringHtmlPurifier' => 'Application\Filter\StringHtmlPurifier',
        ),
    ),
    
    'view_helpers' => array(
        'invokables'=> array(
            'pageTitle'    => 'Application\View\Helper\PageTitle',
            'showForm'     => 'Application\View\Helper\ShowForm',
            'date'         => 'Application\View\Helper\Date',
        ),
        'factories'=> array(
            'showMessages' => 'Application\View\Helper\ShowMessagesFactory',
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/header'           => __DIR__ . '/../view/layout/header.phtml',
            'layout/footer'           => __DIR__ . '/../view/layout/footer.phtml',
            'layout/sidebar'          => __DIR__ . '/../view/layout/sidebar.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'pagination/sliding'      => __DIR__ . '/../view/pagination/sliding.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    'session' => array(
//        'save_path' => realpath(APPLICATION_ROOT . '/data/session'),
        'name'      => 'ZEND_TOGETHER_SESSION',
    ),
    
    'navigation' => array(
        'default' => array(
            'service' => array(
                'type'       => 'mvc',
                'order'      => '900',
                'label'      => 'Über uns',
                'route'      => 'application',
                'controller' => 'about',
                'action'     => 'index',
                'pages'      => array(
                    'team' => array(
                        'type'       => 'mvc',
                        'label'      => 'Team',
                        'route'      => 'application',
                        'controller' => 'about',
                        'action'     => 'team',
                    ),
                    'contact' => array(
                        'type'       => 'mvc',
                        'label'      => 'Kontakt',
                        'route'      => 'application',
                        'controller' => 'about',
                        'action'     => 'contact',
                    ),
                    'imprint' => array(
                        'type'       => 'mvc',
                        'label'      => 'Impressum',
                        'route'      => 'application',
                        'controller' => 'about',
                        'action'     => 'imprint',
                    ),
                    'speaker' => array(
                        'type'       => 'mvc',
                        'label'      => 'Sprecher',
                        'route'      => 'application',
                        'controller' => 'about',
                        'action'     => 'speaker',
                    ),
                ),
            ),
        ),
    ),
    
    'acl' => array(
        'guest'   => array(
            'index'   => array('allow' => null),
            'listing' => array('allow' => null),
            'about'   => array('allow' => null),
        ),
    ),
);
