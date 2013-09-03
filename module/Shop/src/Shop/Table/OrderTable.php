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
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Order table
 * 
 * Handles the orders table for the Shop module 
 * 
 * @package    Shop
 */
class OrderTable extends TableGateway implements OrderTableInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter, OrderEntityInterface $entity, HydratorInterface $hydrator)
    {
        $resultSet = new HydratingResultSet();
        $resultSet->setHydrator($hydrator);
        $resultSet->setObjectPrototype($entity);
        
        parent::__construct('orders', $adapter, null, $resultSet);
    }
    
    /**
     * Fetch single order by id
     * 
     * @param integer $id id of order
     * @return OrderEntityInterface
     */
    public function fetchSingleById($id)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('id', $id);
        
        $row = $this->selectWith($select)->current();
        
        return $row;
    }
}
