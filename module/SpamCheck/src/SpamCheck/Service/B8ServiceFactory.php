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
namespace SpamCheck\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Create comment service factory
 * 
 * @package    SpamCheck
 */
class B8ServiceFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config  = $serviceLocator->get('Config');
        $b8      = new \b8(
            $config['b8']['config_b8'], $config['b8']['config_database']
        );
        $service = new B8Service($b8);
        return $service;
    }
}
