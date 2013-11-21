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
use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * Blog table interface
 * 
 * Handles the blogs table for the Blog module 
 * 
 * @package    Blog
 */
interface BlogTableInterface extends TableGatewayInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter, BlogEntityInterface $entity);
    
    /**
     * Fetch single blog by url
     * 
     * @param varchar $url url address of blog
     * @return BlogEntityInterface
     */
    public function fetchSingleByUrl($url);
    
    /**
     * Fetch single blog by id
     * 
     * @param integer $id id ofblog
     * @return BlogEntityInterface
     */
    public function fetchSingleById($id);
}
