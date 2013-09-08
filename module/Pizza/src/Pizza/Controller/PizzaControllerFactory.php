<?php
/**
 * Website Zend\Together
 *
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Pizza controller factory
 * 
 * Generates the Pizza controller object
 * 
 * @package    Pizza
 */
class PizzaControllerFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm         = $serviceLocator->getServiceLocator();
        $service    = $sm->get('Pizza\Service\Pizza');
        $controller = new PizzaController();
        $controller->setPizzaService($service);
        return $controller;
    }
}
