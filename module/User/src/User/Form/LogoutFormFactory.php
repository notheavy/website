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
 * Logout form factory
 * 
 * @package    User
 */
class LogoutFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $inputFilterManager = $serviceLocator->get('InputFilterManager');
        
        $form = new UserForm('logout');
        $form->addCsrfElement();
        $form->addSubmitElement('logout', 'user_button_logout');
        $form->setInputFilter($inputFilterManager->get('User\Filter\User'));
        $form->setValidationGroup(array('logout'));
        return $form;
    }
}
