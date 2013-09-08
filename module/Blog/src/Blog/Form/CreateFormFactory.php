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
 * Create form factory
 * 
 * @package    Blog
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
        
        $form = new BlogForm('create');
        $form->addCsrfElement();
        $form->addTitleElement();
        $form->addTeaserElement();
        $form->addContentElement();
        $form->addSubmitElement('save', 'blog_button_save');
        $form->addSubmitElement('cancel', 'blog_button_cancel');
        $form->setInputFilter($inputFilterManager->get('Blog\Filter\Blog'));
        $form->setValidationGroup(
            array('title', 'teaser', 'content', 'save', 'cancel')
        );
        return $form;
    }
}
