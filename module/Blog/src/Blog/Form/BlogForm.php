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

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

/**
 * Blog Form
 * 
 * @package    Blog
 */
class BlogForm extends Form implements BlogFormInterface
{
    /**
     * Add csrf element
     */
    public function addCsrfElement($name = 'tick')
    {
        $element = new Csrf($name);
        $this->add($element);
    }
        
    /**
     * Add id element
     */
    public function addIdElement($name = 'id')
    {
        $element = new Hidden($name);
        $this->add($element);
    }
        
    /**
     * Add title element
     */
    public function addTitleElement($name = 'title')
    {
        $element = new Text($name);
        $element->setLabel('blog_label_title');
        $element->setAttribute('class', 'span5');
        $this->add($element);
    }
    
    /**
     * Add teaser element
     */
    public function addTeaserElement($name = 'teaser')
    {
        $element = new Textarea($name);
        $element->setLabel('blog_label_teaser');
        $element->setAttribute('class', 'ckeditor');
        $this->add($element);
    }
    
    /**
     * Add content element
     */
    public function addContentElement($name = 'content')
    {
        $element = new Textarea($name);
        $element->setLabel('blog_label_content');
        $element->setAttribute('class', 'ckeditor');
        $this->add($element);
    }
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'blog_button_save')
    {
        $element = new Submit($name);
        $element->setValue($label);
        $element->setAttribute('class', 'btn');
        $this->add($element);
    }
}
