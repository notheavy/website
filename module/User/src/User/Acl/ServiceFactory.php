<?php
/**
 * Website Zend\Together
 *
 * @package    User
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace User\Acl;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Create ACL factory
 * 
 * @package    User
 */
class ServiceFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $auth   = $serviceLocator->get('User\Auth\Service');
        $role   = $auth->hasIdentity() 
                ? $auth->getIdentity()->getRole() 
                : 'guest';
        $acl    = new Service($role, $config['acl']);
        return $acl;
    }
}
