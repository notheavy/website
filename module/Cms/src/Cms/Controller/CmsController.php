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
namespace Cms\Controller;

use Cms\Service\CmsServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Cms controller
 * 
 * Handles the cms pages
 * 
 * @package    Cms
 */
class CmsController extends AbstractActionController
{
    /**
     * @var CmsServiceInterface
     */
    protected $cmsService;

    /**
     * Constructor
     *
     * @param  CmsServiceInterface $cmsService
     */
    public function __construct(CmsServiceInterface $cmsService)
    {
        $this->setCmsService($cmsService);
    }

    /**
     * Sets comment cmsService
     *
     * @param  CmsServiceInterface $cmsService
     * @return AbstractHelper
     */
    public function setCmsService(CmsServiceInterface $cmsService = null)
    {
        $this->cmsService = $cmsService;
        return $this;
    }
    
    /**
     * Returns CmsService
     *
     * @return CmsServiceInterface
     */
    public function getCmsService()
    {
        return $this->cmsService;
    }
    
    /**
     * Handle cms page
     */
    public function indexAction()
    {
        // Redirect to home
        return $this->redirect()->toRoute('home');
    }
    
    /**
     * Handle save page
     */
    public function saveAction()
    {
        // get data
        $data = $this->getCmsService()->getFormData(
            $this->getRequest()->getPost()->toArray()
        );
        
        // save block
        $this->getCmsService()->saveBlock($data['block'], $data['content']);
        
        // add message
        $this->flashMessenger()->addMessage('cms_message_saving_successful');
        
        // redirect to url
        return $this->redirect()->toUrl($data['url']);
    }
}
