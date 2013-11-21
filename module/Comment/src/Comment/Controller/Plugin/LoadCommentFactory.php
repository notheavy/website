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
namespace Comment\Controller\Plugin;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Load comment factory
 * 
 * Loads comment and creates redirect if not available
 * 
 * @package    Comment
 */
class LoadCommentFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm      = $serviceLocator->getServiceLocator();
        $service = $sm->get('Comment\Service\Comment');
        $helper  = new LoadComment($service);
        return $helper;
    }
}
