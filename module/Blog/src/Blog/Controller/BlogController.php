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
namespace Blog\Controller;

use Zend\Feed\Writer\Feed;
use Zend\View\Model\FeedModel;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Blog\Service\BlogServiceInterface;

/**
 * Blog controller
 * 
 * Handles the blog pages
 * 
 * @package    Blog
 */
class BlogController extends AbstractActionController
{
    /**
     * @var BlogServiceInterface
     */
    protected $blogService;
    
    /**
     * set the blog service
     * 
     * @param BlogServiceInterface
     */
    public function setBlogService(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;

        return $this;
    }
    
    /**
     * Get the blog service
     * 
     * @return BlogServiceInterface
     */
    public function getBlogService()
    {
        return $this->blogService;
    }
    
    /**
     * Handle blog page
     */
    public function indexAction()
    {
        // read page from route
        $page = (int) $this->params()->fromRoute('page');
        
        // set max blog per page
        $maxPage = 10;
        
        // read data and pass to view
        return new ViewModel(array(
            'blogList' => $this->getBlogService()->fetchList($page, $maxPage),
        ));
    }
    
    /**
     * Handle show page
     */
    public function showAction()
    {
        // read url from route
        $url = $this->params()->fromRoute('url');
        
        // fetch data
        $blogData = $this->getBlogService()->fetchSingleByUrl($url);
        
        // check data
        if (!$blogData) {
            // Redirect to blog page
            return $this->redirect()->toRoute('blog');
        }
        
        // read data and pass to view
        return new ViewModel(array(
            'blogData' => $blogData,
        ));
    }
    
    /**
     * Handle rss page
     */
    public function rssAction()
    {
        // set page and max blog per page
        $page    = 1;
        $maxPage = 10;
        
        // get blog entries
        $blogList = $this->getBlogService()->fetchList($page, $maxPage);

        // get translator
        $translator = $this->getServiceLocator()->get('translator');
        
        // create feed
        $feed = new Feed();
        $feed->setTitle($translator->translate('application_head_index') . ' - ' . $translator->translate('blog_head_list'));
        $feed->setFeedLink($this->url()->fromRoute('blog/rss', array(), true), 'atom');
        $feed->addAuthor(array(
            'name'  => $translator->translate('application_head_index'),
            'email' => 'info@zf-together.com',
            'uri'   => 'http://www.zf-together.com',
        ));
        $feed->setDescription($translator->translate('application_head_index') . ' - ' . $translator->translate('blog_head_list'));
        $feed->setLink('http://www.zf-together.com');
        $feed->setDateModified(time());
        
        // add blog entries
        foreach ($blogList as $blog) {
            $entry = $feed->createEntry();
            $entry->setTitle($blog->getTitle());
            $entry->setLink($this->url()->fromRoute('blog/action', array('url' => '$blog->getUrl()'), true));
            $entry->setDescription($blog->getContent());
            $entry->setDateCreated(strtotime($blog->getCdate()));
            
            $feed->addEntry($entry);
        }
        
        // create feed model
        $feedmodel = new FeedModel();
        $feedmodel->setFeed($feed);

        return $feedmodel;
    }
}
