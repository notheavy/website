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

use Shop\Entity\OrderEntityInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Order table interface
 * 
 * Handles the orders table for the Shop module 
 * 
 * @package    Shop
 */
interface OrderTableInterface extends TableGatewayInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter, OrderEntityInterface $entity, HydratorInterface $hydrator);
    
    /**
     * Fetch single order by id
     * 
     * @param integer $id id of order
     * @return OrderEntityInterface
     */
    public function fetchSingleById($id);
}
