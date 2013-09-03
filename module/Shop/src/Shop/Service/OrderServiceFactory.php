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
namespace Shop\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Create shop service factory
 * 
 * @package    Shop
 */
class OrderServiceFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $table    = $serviceLocator->get('Shop\Table\Order');
        $basket   = $serviceLocator->get('Shop\Service\Basket');
        $identity = $serviceLocator->get('User\Auth\Service')->getIdentity();
        $service  = new OrderService($table, $basket, $identity);
        return $service;
    }
}
