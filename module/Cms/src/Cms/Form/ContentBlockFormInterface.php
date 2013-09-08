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

use Zend\Form\FormInterface;

/**
 * Cms Form
 * 
 * @package    Cms
 */
interface ContentBlockFormInterface extends FormInterface
{
    /**
     * Add hidden element
     */
    public function addHiddenElement($name = 'url', $value = '');
        
    /**
     * Add button element
     */
    public function addButtonElement(
        $name = 'cms_save', $label = 'Speichern', $onClick = '',
        $disabled = 'disabled'
    );
}
