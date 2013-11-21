<?php
/**
 * Website Zend\Together
 *
 * @package    Blog
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Blog\Table;

use Blog\Entity\BlogEntityInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Blog table
 * 
 * Handles the blogs table for the Blog module 
 * 
 * @package    Blog
 */
class BlogTable extends TableGateway implements BlogTableInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter, BlogEntityInterface $entity)
    {
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype($entity);
        
        parent::__construct('blogs', $adapter, null, $resultSet);
    }
    
    /**
     * Fetch single blog by url
     * 
     * @param varchar $url url address of blog
     * @return BlogEntityInterface
     */
    public function fetchSingleByUrl($url)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('url', $url);
        
        return $this->selectWith($select)->current();
    }
    
    /**
     * Fetch single blog by id
     * 
     * @param integer $id id ofblog
     * @return BlogEntityInterface
     */
    public function fetchSingleById($id)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('id', $id);
        
        return $this->selectWith($select)->current();
    }
}
