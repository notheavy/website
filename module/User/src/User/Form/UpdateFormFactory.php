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
 * Update form factory
 * 
 * @package    User
 */
class UpdateFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $inputFilterManager = $serviceLocator->get('InputFilterManager');
        
        $userEntity  = $serviceLocator->get('User\Entity\User');
        $roleOptions = $userEntity->getRoleNames();
        
        $form = new UserForm('update');
        $form->addIdElement();
        $form->addCsrfElement();
        $form->addRoleElement($roleOptions);
        $form->addEmailElement();
        $form->addPassElement();
        $form->addFirstnameElement();
        $form->addLastnameElement();
        $form->addSubmitElement('save', 'user_button_save');
        $form->addSubmitElement('cancel', 'user_button_cancel');
        $form->setInputFilter($inputFilterManager->get('User\Filter\User'));
        $form->setValidationGroup(array('id', 'role', 'email', 'pass', 'firstname', 'lastname', 'save', 'cancel'));
        return $form;
    }
}
