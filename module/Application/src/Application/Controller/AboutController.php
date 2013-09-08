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

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * About controller
 * 
 * Handles the homepage and other pages
 * 
 * @package    Application
 */
class AboutController extends AbstractActionController
{
    /**
     * Handle about page
     */
    public function indexAction()
    {
        return new ViewModel();
    }
    
    /**
     * Handle imprint page
     */
    public function imprintAction()
    {
        return new ViewModel();
    }
    
    /**
     * Handle team page
     */
    public function teamAction()
    {
        return new ViewModel();
    }
    
    /**
     * Handle contact page
     */
    public function contactAction()
    {
        return new ViewModel();
    }

    /**
     * Handle speaker page
     */
    public function speakerAction()
    {
        return new ViewModel();
    }

    /**
     * Handle sessions page
     */
    public function sessionsAction()
    {
        return new ViewModel();
    }

    /**
     * Handle tickets page
     */
    public function ticketsAction()
    {
        return new ViewModel();
    }

    /**
     * Handle location page
     */
    public function locationAction()
    {
        return new ViewModel();
    }
}
