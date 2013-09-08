<?php
/**
 * Website Zend\Together
 *
 * @package    Blog
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * Blog module configuration
 * 
 * @package    Blog
 */
return array(
    'router' => array(
        'routes' => array(
            'blog' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/blog',
                    'constraints' => array(
                    ),
                    'defaults' => array(
                        'controller' => 'blog',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'action' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:url',
                            'constraints' => array(
                                'url' => '[a-zA-Z][a-zA-Z0-9-]*',
                            ),
                            'defaults' => array(
                                'action'     => 'show',
                            ),
                        ),
                    ),
                    'page' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:page',
                            'constraints' => array(
                                'page'   => '[0-9]+',
                            ),
                        ),
                    ),
                    'rss' => array(
                        'type'    => 'literal',
                        'options' => array(
                            'route'    => '/rss',
                            'defaults' => array(
                                'action'     => 'rss',
                            ),
                        ),
                    ),
                ),
            ),
            'blog-admin' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/blog-admin',
                    'defaults' => array(
                        'controller' => 'blog-admin',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'action' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:action[/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                        ),
                    ),
                    'page' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'    => '/:page[/:sort]',
                            'constraints' => array(
                                'page'   => '[0-9]+',
                                'sort'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    
    'controllers' => array(
        'factories' => array(
            'blog'       => 'Blog\Controller\BlogControllerFactory',
            'blog-admin' => 'Blog\Controller\AdminControllerFactory',
        ),
    ),
    
    'service_manager' => array(
        'invokables' => array(
            'Blog\Entity\Blog'   => 'Blog\Entity\BlogEntity',
        ),
        'factories' => array(
            'Blog\Table\Blog'    => 'Blog\Table\BlogTableFactory',
            'Blog\Form\Create'   => 'Blog\Form\CreateFormFactory',
            'Blog\Form\Update'   => 'Blog\Form\UpdateFormFactory',
            'Blog\Form\Delete'   => 'Blog\Form\DeleteFormFactory',
            'Blog\Service\Blog'  => 'Blog\Service\BlogServiceFactory',
        ),
    ),
    
    'input_filters' => array(
        'invokables' => array(
            'Blog\Filter\Blog'   => 'Blog\Filter\BlogFilter',
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewFeedStrategy',
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

    'navigation' => array(
        'default' => array(
            'blog' => array(
                'type'       => 'uri',
                'order'      => '800',
                'label'      => 'blog_menu_index',
                'uri'        => '#',
                'pages'      => array(
                    'blog' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_menu_list',
                        'route'      => 'blog',
                        'controller' => 'blog',
                        'action'     => 'index',
                    ),
                    'show' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_menu_show',
                        'route'      => 'blog',
                        'controller' => 'blog',
                        'action'     => 'show',
                        'visible'    => false,
                    ),
                    'blog-admin' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_menu_admin',
                        'route'      => 'blog-admin',
                        'controller' => 'blog-admin',
                        'action'     => 'index',
                    ),
                    'create' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_menu_create',
                        'route'      => 'blog-admin',
                        'controller' => 'blog-admin',
                        'action'     => 'create',
                        'visible'    => false,
                    ),
                    'update' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_menu_update',
                        'route'      => 'blog-admin',
                        'controller' => 'blog-admin',
                        'action'     => 'update',
                        'visible'    => false,
                    ),
                    'delete' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_menu_delete',
                        'route'      => 'blog-admin',
                        'controller' => 'blog-admin',
                        'action'     => 'delete',
                        'visible'    => false,
                    ),
                ),
            ),
        ),
    ),
    
    'acl' => array(
        'guest'   => array(
            'blog' => array('allow' => null),
        ),
        'staff'   => array(
            'blog-admin' => array('allow' => null),
        ),
    ),
);
