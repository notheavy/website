<?php
/**
 * Website Zend\Together
 *
 * @package    Cms
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Cms\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Cms controller factory
 * 
 * Handles the cms pages
 * 
 * @package    Cms
 */
class CmsControllerFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm      = $serviceLocator->getServiceLocator();
        $service = $sm->get('Cms\Service\Cms');
        $helper  = new CmsController($service);
        return $helper;
    }
}
