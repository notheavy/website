<?php
/**
 * Website Zend\Together
 *
 * @package    Cms
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Cms\Form;

use Zend\Form\Element\Hidden;
use Zend\Form\Element\Button;
use Zend\Form\Form;

/**
 * Cms Form
 * 
 * @package    Cms
 */
class ContentBlockForm extends Form implements ContentBlockFormInterface
{
    /**
     * Add hidden element
     */
    public function addHiddenElement($name = 'url', $value = '')
    {
        $element = new Hidden($name);
        $element->setValue($value);
        $this->add($element);
    }
        
    /**
     * Add button element
     */
    public function addButtonElement(
        $name = 'cms_save', $label = 'cms_button_save', $onClick = '',
        $disabled = 'disabled'
    )
    {
        $element = new Button($name);
        $element->setLabel($label);
        $element->setAttribute('class', 'btn');
        $element->setAttribute('id', $name);
        $element->setAttribute('onClick', $onClick);
        $element->setAttribute('disabled', $disabled);
        $this->add($element);
    }
}
