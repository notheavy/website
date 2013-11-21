<?php
/**
 * Website Zend\Together
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * Application module configuration
 *
 * @package    Application
 */
return array(
    'router'          => array(
        'routes' => array(
            'home'        => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '/[:lang]',
                    'constraints' => array(
                        'lang' => 'de|en',
                    ),
                    'defaults'    => array(
                        'controller' => 'index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '[/:lang][/:controller[/:action[/:page]]]',
                    'constraints' => array(
                        'lang'       => 'de|en',
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'page'       => '[0-9_-]*',
                    ),
                    'defaults'    => array(
                        'controller' => 'index',
                        'action'     => 'index',
                        'page'       => '1',
                    ),
                ),
            ),
        ),
    ),

    'controllers'     => array(
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
        'aliases'   => array(
            'translator' => 'MvcTranslator',
        ),
    ),

    'filters'         => array(
        'invokables' => array(
            'stringToUrl'        => 'Application\Filter\StringToUrl',
            'stringHtmlPurifier' => 'Application\Filter\StringHtmlPurifier',
        ),
    ),

    'view_helpers'    => array(
        'invokables' => array(
            'bootstrapMenu' => 'Application\View\Helper\BootstrapMenu',
            'pageTitle'     => 'Application\View\Helper\PageTitle',
            'showForm'      => 'Application\View\Helper\ShowForm',
            'date'          => 'Application\View\Helper\Date',
        ),
        'factories'  => array(
            'showMessages' => 'Application\View\Helper\ShowMessagesFactory',
        ),
    ),

    'view_manager'    => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/header'           => __DIR__ . '/../view/layout/header.phtml',
            'layout/footer'           => __DIR__ . '/../view/layout/footer.phtml',
            'layout/sidebar'          => __DIR__ . '/../view/layout/sidebar.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'pagination/sliding'      => __DIR__ . '/../view/pagination/sliding.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack'      => array(
            __DIR__ . '/../view',
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
        'cache'                     => array(
            'adapter' => array(
                'name'    => 'filesystem',
                'options' => array(
                    'cache_dir' => APPLICATION_ROOT . '/data/cache',
                    'ttl'       => 5,
                ),
            ),
            'plugins' => array(
                'serializer'
            ),
        ),
    ),

    'session'         => array(
        'save_path' => realpath(APPLICATION_ROOT . '/data/session'),
        'name'      => 'ZEND_TOGETHER_SESSION',
    ),

    'navigation'      => array(
        'default' => array(
            'about'    => array(
                'type'            => 'mvc',
                'order'           => '100',
                'label'           => 'application_menu_about',
                'route'           => 'application',
                'controller'      => 'about',
                'action'          => 'index',
                'use_route_match' => true,
            ),
            'speaker'  => array(
                'type'            => 'mvc',
                'order'           => '200',
                'label'           => 'application_menu_speaker',
                'route'           => 'application',
                'controller'      => 'about',
                'action'          => 'speaker',
                'use_route_match' => true,
            ),
            'sessions' => array(
                'type'            => 'mvc',
                'order'           => '300',
                'label'           => 'application_menu_sessions',
                'route'           => 'application',
                'controller'      => 'about',
                'action'          => 'sessions',
                'use_route_match' => true,
            ),
            'location' => array(
                'type'            => 'mvc',
                'order'           => '400',
                'label'           => 'application_menu_location',
                'route'           => 'application',
                'controller'      => 'about',
                'action'          => 'location',
                'use_route_match' => true,
            ),
            'tickets'  => array(
                'type'            => 'mvc',
                'order'           => '500',
                'label'           => 'application_menu_tickets',
                'route'           => 'application',
                'controller'      => 'about',
                'action'          => 'tickets',
                'use_route_match' => true,
            ),
            'service'  => array(
                'type'  => 'uri',
                'order' => '700',
                'label' => 'application_menu_service',
                'uri'   => '#',
                'pages' => array(
                    'team'    => array(
                        'type'            => 'mvc',
                        'label'           => 'application_menu_team',
                        'route'           => 'application',
                        'controller'      => 'about',
                        'action'          => 'team',
                        'use_route_match' => true,
                    ),
                    'contact' => array(
                        'type'            => 'mvc',
                        'label'           => 'application_menu_contact',
                        'route'           => 'application',
                        'controller'      => 'about',
                        'action'          => 'contact',
                        'use_route_match' => true,
                    ),
                    'imprint' => array(
                        'type'            => 'mvc',
                        'label'           => 'application_menu_imprint',
                        'route'           => 'application',
                        'controller'      => 'about',
                        'action'          => 'imprint',
                        'use_route_match' => true,
                    ),
                ),
            ),
        ),
    ),

    'acl'             => array(
        'guest' => array(
            'index'   => array('allow' => null),
            'listing' => array('allow' => null),
            'about'   => array('allow' => null),
        ),
    ),
);
