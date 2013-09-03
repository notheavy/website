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
namespace Pizza\Form;

use Zend\Form\FormInterface;

/**
 * Pizza Form interface
 * 
 * @package    Pizza
 */
interface PizzaFormInterface extends FormInterface
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
     * Add name element
     */
    public function addNameElement($name = 'name');
    
    /**
     * Add description element
     */
    public function addDescriptionElement($name = 'description');
    
    /**
     * Add price element
     */
    public function addPriceElement($name = 'price');
    
    /**
     * Add crust element
     */
    public function addCrustElement($options = array(), $name = 'crust_id');
    
    /**
     * Add toppings element
     */
    public function addToppingsElement($options = array(), $name = 'toppings');
    
    /**
     * Add picture element
     */
    public function addPictureElement($name = 'picture');
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'Speichern');
}
