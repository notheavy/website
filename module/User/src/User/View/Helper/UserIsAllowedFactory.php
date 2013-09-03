<?php
/**
 * Website Zend\Together
 *
 * @package    User
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace User\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * User is allowed view helper factory
 * 
 * Generates the Is allowed view helper object
 * 
 * @package    User
 */
class UserIsAllowedFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm     = $serviceLocator->getServiceLocator();
        $acl    = $sm->get('User\Acl\Service');
        $helper = new UserIsAllowed($acl);
        return $helper;
    }
}
