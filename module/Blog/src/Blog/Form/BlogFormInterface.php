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
namespace Blog\Form;

use Zend\Form\FormInterface;

/**
 * Blog Form interface
 * 
 * @package    Blog
 */
interface BlogFormInterface extends FormInterface
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
     * Add title element
     */
    public function addTitleElement($name = 'title');
    
    /**
     * Add teaser element
     */
    public function addTeaserElement($name = 'teaser');
    
    /**
     * Add content element
     */
    public function addContentElement($name = 'content');
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'blog_button_save');
}
