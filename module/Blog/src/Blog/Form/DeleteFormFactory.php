<?php
/**
 * Website Zend\Together
 *
 * @package    Blog
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Blog\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Delete form factory
 * 
 * @package    Blog
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
        
        $form = new BlogForm('delete');
        $form->addIdElement();
        $form->addCsrfElement();
        $form->addSubmitElement('delete', 'blog_button_delete');
        $form->addSubmitElement('cancel', 'blog_button_cancel');
        $form->setInputFilter($inputFilterManager->get('Blog\Filter\Blog'));
        $form->setValidationGroup(array('id', 'delete', 'cancel'));
        return $form;
    }
}
