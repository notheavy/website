<?php
/**
 * Website Zend\Together
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Application\Controller;

use Locale;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Index controller
 * 
 * Handles the homepage and other pages
 * 
 * @package    Application
 */
class IndexController extends AbstractActionController
{
    /**
     * Handle homepage
     */
    public function indexAction()
    {
        if (is_null($this->params()->fromRoute('lang')))
        {
            return $this->redirect()->toRoute('home', array('lang' => 'de'));
        }

        return new ViewModel();
    }
}
