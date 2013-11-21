<?php
/**
 * Website Zend\Together
 *
 * @package    User
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * User module configuration
 *
 * @package    User
 */
return array(
    'router'          => array(
        'routes' => array(
            'user'       => array(
                'type'    => 'segment',
                'options' => array(
                    'route'       => '[/:lang]/user[/:action]',
                    'constraints' => array(
                        'lang'   => 'de|en',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults'    => array(
                        'controller' => 'user',
                        'action'     => 'index',
                    ),
                ),
            ),
            'user-admin' => array(
                'type'          => 'segment',
                'options'       => array(
                    'route'       => '[/:lang]/user-admin',
                    'constraints' => array(
                        'lang' => 'de|en',
                    ),
                    'defaults'    => array(
                        'controller' => 'user-admin',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'action' => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/:action[/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]+',
                            ),
                        ),
                    ),
                    'page'   => array(
                        'type'    => 'segment',
                        'options' => array(
                            'route'       => '/:page[/:sort]',
                            'constraints' => array(
                                'page' => '[0-9]+',
                                'sort' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers'     => array(
        'factories' => array(
            'user'       => 'User\Controller\UserControllerFactory',
            'user-admin' => 'User\Controller\AdminControllerFactory',
        ),
    ),

    'input_filters'   => array(
        'invokables' => array(
            'User\Filter\User' => 'User\Filter\UserFilter',
        ),
    ),

    'service_manager' => array(
        'invokables' => array(
            'User\Entity\User' => 'User\Entity\UserEntity',
        ),
        'factories'  => array(
            'User\Table\User'    => 'User\Table\UserTableFactory',
            'User\Form\Register' => 'User\Form\RegisterFormFactory',
            'User\Form\Update'   => 'User\Form\UpdateFormFactory',
            'User\Form\Delete'   => 'User\Form\DeleteFormFactory',
            'User\Form\Login'    => 'User\Form\LoginFormFactory',
            'User\Form\Logout'   => 'User\Form\LogoutFormFactory',
            'User\Acl\Service'   => 'User\Acl\ServiceFactory',
            'User\Auth\Adapter'  => 'User\Authentication\DbBcryptAdapterFactory',
            'User\Auth\Service'  => 'User\Authentication\ServiceFactory',
            'User\Service\User'  => 'User\Service\UserServiceFactory',
        ),
    ),

    'view_helpers'    => array(
        'factories' => array(
            'UserShowWidget' => 'User\View\Helper\UserShowWidgetFactory',
            'UserIsAllowed'  => 'User\View\Helper\UserIsAllowedFactory',
        ),
    ),

    'view_manager'    => array(
        'template_map'        => array(
            'widget/logout' => realpath(__DIR__ . '/../view/user/widget/logout.phtml'),
            'widget/login'  => realpath(__DIR__ . '/../view/user/widget/login.phtml'),
        ),
        'template_path_stack' => array(
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

    'navigation'      => array(
        'default' => array(/*
            'user' => array(
                'type'       => 'mvc',
                'order'      => '700',
                'label'      => 'blog_user_index',
                'route'      => 'user',
                'controller' => 'user',
                'action'     => 'index',
                'pages'      => array(
                    'register' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_user_register',
                        'route'      => 'user',
                        'controller' => 'user',
                        'action'     => 'register',
                'use_route_match' => true,
                    ),
                    'login' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_user_login',
                        'route'      => 'user',
                        'controller' => 'user',
                        'action'     => 'login',
                'use_route_match' => true,
                    ),
                    'user-admin' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_user_admin',
                        'route'      => 'user-admin',
                        'controller' => 'user-admin',
                        'action'     => 'index',
                'use_route_match' => true,
                    ),
                    'update' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_user_update',
                        'visible'    => false,
                        'route'      => 'user-admin',
                        'controller' => 'user-admin',
                        'action'     => 'update',
                'use_route_match' => true,
                    ),
                    'delete' => array(
                        'type'       => 'mvc',
                        'label'      => 'blog_user_delete',
                        'visible'    => false,
                        'route'      => 'user-admin',
                        'controller' => 'user-admin',
                        'action'     => 'delete',
                'use_route_match' => true,
                    ),
                ),
            ),
*/
        ),
    ),

    'acl'             => array(
        'guest'       => array(
            'user' => array(
                'allow' => null,
                'deny'  => array('logout', 'update'),
            ),
        ),
        'participant' => array(
            'user' => array(
                'allow' => null,
                'deny'  => array('login', 'register'),
            ),
        ),
        'admin'       => array(
            'user'       => array('allow' => null),
            'user-admin' => array('allow' => null),
        ),
    ),
);
