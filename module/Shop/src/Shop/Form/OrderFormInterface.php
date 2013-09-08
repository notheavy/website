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
namespace Shop\Form;

use Zend\Form\FormInterface;

/**
 * Shop Form interface
 * 
 * @package    Shop
 */
interface OrderFormInterface extends FormInterface
{
    /**
     * Add csrf element
     */
    public function addCsrfElement($name = 'tick');
        
    /**
     * Add id element
     */
    public function addIdElement($name = 'id');
        
    /**
     * Add status element
     */
    public function addStatusElement($options = array(), $name = 'status');
    
    /**
     * Add comments element
     */
    public function addCommentsElement($name = 'comments');
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'Bestellen');
}
