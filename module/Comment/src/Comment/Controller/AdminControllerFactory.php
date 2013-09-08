<?php
/**
 * Website Zend\Together
 *
 * @package    Comment
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Comment\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Admin controller factory
 * 
 * Generates the Comment controller object
 * 
 * @package    Comment
 */
class AdminControllerFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm         = $serviceLocator->getServiceLocator();
        $service    = $sm->get('Comment\Service\Comment');
        $controller = new AdminController();
        $controller->setCommentService($service);
        return $controller;
    }
}
