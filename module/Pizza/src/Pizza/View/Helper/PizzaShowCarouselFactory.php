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
namespace Pizza\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Show pizza carousel view helper factory
 * 
 * Generates the Show pizza carousel view helper object
 * 
 * @package    Pizza
 */
class PizzaShowCarouselFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm        = $serviceLocator->getServiceLocator();
        $pizzaList = $sm->get('Pizza\Service\Pizza')->fetchList(
            1, 20, array('status' => 'approved')
        );
        $helper    = new PizzaShowCarousel($pizzaList);
        return $helper;
    }
}
