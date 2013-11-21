<?php
/**
 * Website Zend\Together
 *
 * @package    User
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace User\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Register form factory
 * 
 * @package    User
 */
class RegisterFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $inputFilterManager = $serviceLocator->get('InputFilterManager');
        
        $form = new UserForm('register');
        $form->addCsrfElement();
        $form->addEmailElement();
        $form->addPassElement();
        $form->addFirstnameElement();
        $form->addLastnameElement();
        $form->addSubmitElement('save', 'user_button_save');
        $form->addSubmitElement('cancel', 'user_button_cancel');
        $form->setInputFilter($inputFilterManager->get('User\Filter\User'));
        $form->setValidationGroup(array('email', 'pass', 'firstname', 'lastname', 'save', 'cancel'));
        return $form;
    }
}
