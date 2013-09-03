<?php
/**
 * Website Zend\Together
 *
 * @package    Comment
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Comment\View\Helper;

use Comment\Service\CommentServiceInterface;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

/**
 * Show comment list and form view helper
 * 
 * Outputs the comment list and form for a given url
 * 
 * @package    Comment
 */
class CommentShowComments extends AbstractHelper
{
    /**
     * @var CommentServiceInterface
     */
    protected $commentService;

    /**
     * Constructor
     *
     * @param  CommentServiceInterface $commentService
     */
    public function __construct(CommentServiceInterface $commentService)
    {
        $this->setCommentService($commentService);
    }

    /**
     * Sets comment commentService
     *
     * @param  CommentServiceInterface $commentService
     * @return AbstractHelper
     */
    public function setCommentService(CommentServiceInterface $commentService = null)
    {
        $this->commentService = $commentService;
        return $this;
    }
    
    /**
     * Returns CommentService
     *
     * @return CommentServiceInterface
     */
    public function getCommentService()
    {
        return $this->commentService;
    }
    
    /**
     * Outputs the comment list in a carousel
     *
     * @return string 
     */
    public function __invoke($url)
    {
        // prepare create form
        $commentForm = $this->getCommentService()->prepareCreateForm($url);
        
        // configure view model
        $vm = new ViewModel(array(
            'commentList' => $this->getCommentService()->fetchListByUrl($url),
            'commentForm' => $commentForm,
        ));
        $vm->setTemplate('widget/comments');
        
        // render view
        return $this->getView()->render($vm);
    }
}
