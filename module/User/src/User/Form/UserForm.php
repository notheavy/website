<?php
/**
 * Website Zend\Together
 *
 * @package    User
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace User\Form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

/**
 * User Form
 * 
 * @package    User
 */
class UserForm extends Form implements UserFormInterface
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
     * Add role element
     */
    public function addRoleElement($options = array(), $name = 'role')
    {
        $element = new Select($name);
        $element->setLabel('Benutzergruppe');
        $element->setValueOptions($options);
        $this->add($element);
    }
    
    /**
     * Add email element
     */
    public function addEmailElement($name = 'email')
    {
        $element = new Text($name);
        $element->setLabel('E-Mail Adresse');
        $this->add($element);
    }
    
    /**
     * Add pass element
     */
    public function addPassElement($name = 'pass')
    {
        $element = new Password($name);
        $element->setLabel('Passwort');
        $this->add($element);
    }
    
    /**
     * Add firstname element
     */
    public function addFirstnameElement($name = 'firstname')
    {
        $element = new Text($name);
        $element->setLabel('Vorname');
        $this->add($element);
    }
    
    /**
     * Add lastname element
     */
    public function addLastnameElement($name = 'lastname')
    {
        $element = new Text($name);
        $element->setLabel('Nachname');
        $this->add($element);
    }
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'Speichern')
    {
        $element = new Submit($name);
        $element->setValue($label);
        $element->setAttribute('class', 'btn');
        $this->add($element);
    }
}
