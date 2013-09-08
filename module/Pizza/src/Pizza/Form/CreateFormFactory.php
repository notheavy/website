<?php
/**
 * Website Zend\Together
 *
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Create form factory
 * 
 * @package    Pizza
 */
class CreateFormFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $inputFilterManager = $serviceLocator->get('InputFilterManager');
        
        $pizzaEntity   = $serviceLocator->get('Pizza\Entity\Pizza');
        $statusOptions = $pizzaEntity->getStatusNames();
        
        $crustTable   = $serviceLocator->get('Pizza\Table\Crust');
        $crustOptions = $crustTable->fetchOptions();
        
        $toppingTable   = $serviceLocator->get('Pizza\Table\Topping');
        $toppingOptions = $toppingTable->fetchOptions();
        
        $form = new PizzaForm('create');
        $form->addCsrfElement();
        $form->addStatusElement($statusOptions, 'status');
        $form->addNameElement();
        $form->addPriceElement();
        $form->addCrustElement($crustOptions, 'crust_id');
        $form->addToppingsElement($toppingOptions, 'toppings');
        $form->addDescriptionElement();
        $form->addSubmitElement('save', 'Speichern');
        $form->addSubmitElement('cancel', 'Abbrechen');
        $form->setInputFilter($inputFilterManager->get('Pizza\Filter\Pizza'));
        $form->setValidationGroup(array(
            'status', 'name', 'description', 'price', 'crust_id', 'toppings',
            'save', 'cancel'
        ));
        return $form;
    }
}
