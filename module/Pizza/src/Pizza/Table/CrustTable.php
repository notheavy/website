<?php
/**
 * Website Zend\Together
 *
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Table;

use Pizza\Entity\CrustEntityInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Crust table
 * 
 * Handles the crusts table for the Pizza module 
 * 
 * @package    Pizza
 */
class CrustTable extends TableGateway implements CrustTableInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter, CrustEntityInterface $entity)
    {
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype($entity);
        
        parent::__construct('crusts', $adapter, null, $resultSet);
    }
    
    /**
     * Fetch options
     * 
     * @return array
     */
    public function fetchOptions()
    {
        $select = $this->getSql()->select();
        $select->order('name');
        
        $options = array();
        
        foreach ($this->selectWith($select) as $row) {
            $options[$row->getId()] = $row->getName();
        }
        
        return $options;
    }
    
    /**
     * Fetch single crust by id
     * 
     * @param integer $id id ofcrust
     * @return CrustEntity
     */
    public function fetchSingleById($id)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('id', $id);
        
        return $this->selectWith($select)->current();
    }
}
