<?php
/**
 * Website Zend\Together
 *
 * @package    Shop
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Shop\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Order controller factory
 * 
 * Generates the Shop controller object
 * 
 * @package    Shop
 */
class OrderControllerFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm         = $serviceLocator->getServiceLocator();
        $service    = $sm->get('Shop\Service\Order');
        $controller = new OrderController();
        $controller->setOrderService($service);
        return $controller;
    }
}
