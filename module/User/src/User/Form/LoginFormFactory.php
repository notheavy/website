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
 * Login form factory
 * 
 * @package    User
 */
class LoginFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $inputFilterManager = $serviceLocator->get('InputFilterManager');
        
        $form = new UserForm('login');
        $form->addCsrfElement();
        $form->addEmailElement();
        $form->addPassElement();
        $form->addSubmitElement('login', 'user_button_login');
        $form->setInputFilter($inputFilterManager->get('User\Filter\User'));
        $form->setValidationGroup(array('email', 'pass', 'login'));
        return $form;
    }
}
