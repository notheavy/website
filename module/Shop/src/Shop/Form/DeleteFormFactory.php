<?php
/**
 * Website Zend\Together
 *
 * @package    Shop
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Shop\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Delete form factory
 * 
 * @package    Shop
 */
class DeleteFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $inputFilterManager = $serviceLocator->get('InputFilterManager');
        
        $form = new OrderForm('delete');
        $form->addIdElement();
        $form->addCsrfElement();
        $form->addSubmitElement('delete', 'Löschen');
        $form->addSubmitElement('cancel', 'Abbrechen');
        $form->setInputFilter($inputFilterManager->get('Shop\Filter\Order'));
        $form->setValidationGroup(array('id', 'delete', 'cancel'));
        return $form;
    }
}
