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
namespace Shop\Table;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Order table factory
 * 
 * Generates the Order table object
 * 
 * @package    Shop
 */
class OrderTableFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hydratorManager = $serviceLocator->get('HydratorManager');
        
        $adapter  = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $entity   = $serviceLocator->get('Shop\Entity\Order');
        $hydrator = $hydratorManager->get('Shop\Hydrator\Order');
        $table    = new OrderTable($adapter, $entity, $hydrator);
        return $table;
    }
}
