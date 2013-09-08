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
namespace Pizza\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Crust entity interface
 * 
 * @package    Pizza
 */
interface CrustEntityInterface extends ArraySerializableInterface
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
     * Set name
     * 
     * @param string $name
     */
    public function setName($name);
    
    /**
     * Get name
     * 
     * @return string $name
     */
    public function getName();
    
    /**
     * Set costs
     * 
     * @param float $costs
     */
    public function setCosts($costs);
    
    /**
     * Get costs
     * 
     * @return float $costs
     */
    public function getCosts();
}
