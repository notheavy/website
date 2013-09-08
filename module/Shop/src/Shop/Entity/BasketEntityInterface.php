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

/**
 * Shop entity interface
 * 
 * @package    Shop
 */
interface BasketEntityInterface
{
    /**
     * Set positions
     * 
     * @param array $positions
     */
    public function setPositions(array $positions);
    
    /**
     * Get positions
     * 
     * @return array positions
     */
    public function getPositions();
    
    /**
     * get position
     * 
     * @param integer $key
     * @return PositionEntity
     */
    public function getPosition($key);
    
    /**
     * Add position
     * 
     * @param PositionEntity $position
     */
    public function addPosition(PositionEntity $position);
    
    /**
     * Remove position
     * 
     * @param PositionEntity $position
     */
    public function removePosition(PositionEntity $position);
    
    /**
     * Get total
     * 
     * @return float $total
     */
    public function getTotal();
    
    /**
     * Count
     * 
     * @return integer
     */
    public function getCount();
    
    /**
     * Is Empty
     * 
     * @return boolean
     */
    public function isEmpty();
}
