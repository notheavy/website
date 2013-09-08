<?php
/**
 * Website Zend\Together
 *
 * @package    Cms
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Cms\Service;

use Cms\Form\ContentBlockForm;
use Cms\Form\ContentBlockFormInterface;
use Zend\Mvc\I18n\Translator;

/**
 * Cms Service
 * 
 * @package    Cms
 */
class CmsService implements CmsServiceInterface
{
    /**
     * @var Translator
     */
    protected $translator;

    /**
     * Constructor
     *
     * @param  Translator $translator
     */
    public function __construct(Translator $translator)
    {
        $this->setTranslator($translator);
    }

    /**
     * Sets comment translator
     *
     * @param  Translator $translator
     * @return CmsService
     */
    public function setTranslator(Translator $translator = null)
    {
        $this->translator = $translator;
        return $this;
    }

    /**
     * Returns Translator
     *
     * @return Translator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Load content block
     *
     * @param string $block
     * @return string
     */
    public function loadBlock($block)
    {
        // build file name
        $fileName = APPLICATION_ROOT . '/data/cms/' . $block . '.html';
        
        // check file
        if (!file_exists($fileName)) {
            return '';
        }
        
        // get content
        $content = implode('', file($fileName));
        
        // return content
        return $content;
    }
    
    /**
     * Get form data
     *
     * @param array $data
     * @return array
     */
    public function getFormData($data)
    {
        // validate form
        $form = new ContentBlockForm();
        $form->addHiddenElement('url');
        $form->addHiddenElement('block');
        $form->addHiddenElement('content');
        $form->setData($data);
        $form->isValid();
        
        return $form->getData();
    }
    
    /**
     * Get form
     *
     * @param string $block
     * @param string $url
     * @return ContentBlockFormInterface
     */
    public function getForm($block, $url)
    {
        $form = new ContentBlockForm('block_' . $block);
        $form->addHiddenElement('url', $url);
        $form->addHiddenElement('block', $block);
        $form->addHiddenElement('content');
        $form->addButtonElement(
            'cms_edit_' . $block, $this->getTranslator()->translate('cms_button_update'),
            'cmsEditContentBlock(\'' . $block . '\');', false
        );
        $form->addButtonElement(
            'cms_save_' . $block, $this->getTranslator()->translate('cms_button_save'),
            'cmsSaveContentBlock(\'' . $block . '\');'
        );
        $form->addButtonElement(
            'cms_cancel_' . $block, $this->getTranslator()->translate('cms_button_cancel'),
            'cmsCancelContentBlock(\'' . $block . '\');'
        );
        $form->prepare();
        
        return $form;
    }
    
    /**
     * Save content block
     *
     * @param string $block
     * @param string $content
     * @return string
     */
    public function saveBlock($block, $content)
    {
        // build file name
        $fileName = APPLICATION_ROOT . '/data/cms/' . $block . '.html';
    
        // write data to file
        file_put_contents($fileName, $content);
        
        return true;
    }
}
