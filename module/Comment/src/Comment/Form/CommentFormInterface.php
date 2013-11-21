<?php
/**
 * Website Zend\Together
 *
 * @package    Comment
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Comment\Form;

use Zend\Form\FormInterface;

/**
 * Comment Form interface
 * 
 * @package    Comment
 */
interface CommentFormInterface extends FormInterface
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
     * Add url element
     */
    public function addUrlElement($name = 'url');
        
    /**
     * Add status element
     */
    public function addStatusElement($options = array(), $name = 'status');
    
    /**
     * Add email element
     */
    public function addEmailElement($email = 'email');
    
    /**
     * Add name element
     */
    public function addNameElement($name = 'name');
    
    /**
     * Add message element
     */
    public function addMessageElement($name = 'message');
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'comment_button_save');
}
