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
namespace Comment;

use Zend\Filter\StaticFilter;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Comment module class
 * 
 * @package    Comment
 */
class Module implements 
    BootstrapListenerInterface,
    ConfigProviderInterface, 
    AutoloaderProviderInterface
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator = null;
    
    /**
     * Listen to the bootstrap event
     *
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        // set service locator
        $this->serviceLocator = $e->getApplication()->getServiceManager();
        
        // get shared event manager
        $sharedEventManager = $this->serviceLocator->get('SharedEventManager');
        
        // add form event
        $sharedEventManager->attach(
            'Comment\Service\CommentService', 
            'set-comment-form', 
            array($this, 'onFormSet')
        );
    }
    
    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    /**
     * Inject Form defined by type to CommentService when triggered
     *
     * @param EventInterface
     */
    public function onFormSet(EventInterface $e)
    {
        $type = $e->getParam('type', 'create');
        $service = $this->serviceLocator->get('Comment\Service\Comment');
        $form    = $this->serviceLocator->get('Comment\Form\\' . ucfirst($type));
        $service->setForm($form, $type);
    }
}
