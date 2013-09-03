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
namespace Shop\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Position entity interface
 * 
 * @package    Shop
 */
interface PositionEntityInterface extends ArraySerializableInterface
{
    /**
     * Set id
     * 
     * @param integer $id
     */
    public function setId($id);
    
    /**
     * Get id
     * 
     * @return integer $id
     */
    public function getId();
    
    /**
     * Set quantity
     * 
     * @param integer $quantity
     */
    public function setQuantity($quantity);
    
    /**
     * Add quantity
     * 
     * @param integer $quantity
     */
    public function addQuantity($quantity = 1);
    
    /**
     * Sub quantity
     * 
     * @param integer $quantity
     */
    public function subQuantity($quantity);
    
    /**
     * Get quantity
     * 
     * @return integer $quantity
     */
    public function getQuantity();
    
    /**
     * Get amount
     * 
     * @return float $amount
     */
    public function getAmount();
    
    /**
     * Set entity
     * 
     * @param object $entity
     */
    public function setEntity($entity);
    
    /**
     * Get entity
     * 
     * @return object $entity
     */
    public function getEntity();
}
