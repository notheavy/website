<?php
/**
 * Website Zend\Together
 *
 * @package    SpamCheck
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace SpamCheck\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Show comment list and form view helper factory
 * 
 * Generates the Show comment list and form view helper object
 * 
 * @package    SpamCheck
 */
class SpamCheckFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm      = $serviceLocator->getServiceLocator();
        $service = $sm->get('SpamCheck\Service\B8');
        $helper  = new SpamCheck($service);
        return $helper;
    }
}
