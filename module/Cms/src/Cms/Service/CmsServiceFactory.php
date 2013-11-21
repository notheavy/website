<?php
/**
 * Website Zend\Together
 *
 * @package    Cms
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Cms\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Cms Service factory
 *
 * Generates the Cms Service object
 *
 * @package    Cms
 */
class CmsServiceFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return \Cms\Service\CmsContentBlock|mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $translator = $serviceLocator->get('translator');
        $service = new CmsService($translator);
        return $service;
    }
}
