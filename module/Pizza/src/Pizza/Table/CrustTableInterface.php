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
use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * Crust table interface
 * 
 * Handles the crusts table for the Pizza module 
 * 
 * @package    Pizza
 */
interface CrustTableInterface extends TableGatewayInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter, CrustEntityInterface $entity);
    
    /**
     * Fetch options
     * 
     * @return array
     */
    public function fetchOptions();
    
    /**
     * Fetch single crust by id
     * 
     * @param integer $id id ofcrust
     * @return CrustEntity
     */
    public function fetchSingleById($id);
}
