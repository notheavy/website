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

/**
 * Cms Service interface
 * 
 * @package    Cms
 */
interface CmsServiceInterface
{
    /**
     * Load content block
     *
     * @param string $block
     * @return string
     */
    public function loadBlock($block);
    
    /**
     * Get form data
     *
     * @param array $data
     * @return array
     */
    public function getFormData($data);
    
    /**
     * Get form
     *
     * @param string $block
     * @param string $url
     * @return ContentBlockFormInterface
     */
    public function getForm($block, $url);
    
    /**
     * Save content block
     *
     * @param string $block
     * @param string $content
     * @return string
     */
    public function saveBlock($block, $content);
}
