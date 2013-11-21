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
 * Update form factory
 * 
 * @package    Comment
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
        
        $commentEntity   = $serviceLocator->get('Comment\Entity\Comment');
        $statusOptions = $commentEntity->getStatusNames();
        
        $form = new CommentForm('update');
        $form->addIdElement();
        $form->addCsrfElement();
        $form->addStatusElement($statusOptions, 'status');
        $form->addEmailElement();
        $form->addNameElement();
        $form->addMessageElement();
        $form->addSubmitElement('save', 'comment_button_save');
        $form->addSubmitElement('cancel', 'comment_button_cancel');
        $form->setInputFilter($inputFilterManager->get('Comment\Filter\Comment'));
        $form->setValidationGroup(array(
            'id', 'status', 'email', 'name', 'message', 'save', 'cancel'
        ));
        return $form;
    }
}
