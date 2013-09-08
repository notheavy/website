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

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Create form factory
 * 
 * @package    Comment
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
        
        $form = new CommentForm('create');
        $form->addCsrfElement();
        $form->addUrlElement();
        $form->addEmailElement();
        $form->addNameElement();
        $form->addMessageElement();
        $form->addSubmitElement('save', 'comment_button_save');
        $form->addSubmitElement('cancel', 'comment_button_cancel');
        $form->setInputFilter($inputFilterManager->get('Comment\Filter\Comment'));
        $form->setValidationGroup(array(
            'url', 'email', 'name', 'message', 'save', 'cancel'
        ));
        return $form;
    }
}
