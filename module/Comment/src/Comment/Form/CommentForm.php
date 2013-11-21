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

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

/**
 * Comment Form
 * 
 * @package    Comment
 */
class CommentForm extends Form implements CommentFormInterface
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
     * Add url element
     */
    public function addUrlElement($name = 'url')
    {
        $element = new Hidden($name);
        $this->add($element);
    }
        
    /**
     * Add status element
     */
    public function addStatusElement($options = array(), $name = 'status')
    {
        $element = new Select($name);
        $element->setLabel('comment_label_status');
        $element->setAttribute('class', 'span3');
        $element->setValueOptions($options);
        $this->add($element);
    }
    
    /**
     * Add email element
     */
    public function addEmailElement($email = 'email')
    {
        $element = new Text($email);
        $element->setLabel('comment_label_email');
        $element->setAttribute('class', 'span3');
        $this->add($element);
    }
    
    /**
     * Add name element
     */
    public function addNameElement($name = 'name')
    {
        $element = new Text($name);
        $element->setLabel('comment_label_name');
        $element->setAttribute('class', 'span3');
        $this->add($element);
    }
    
    /**
     * Add message element
     */
    public function addMessageElement($name = 'message')
    {
        $element = new Textarea($name);
        $element->setLabel('comment_label_message');
        $element->setAttribute('class', 'ckeditor');
        $element->setAttribute('rows', '12');
        $this->add($element);
    }
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'comment_button_save')
    {
        $element = new Submit($name);
        $element->setValue($label);
        $element->setAttribute('class', 'btn');
        $this->add($element);
    }
}
