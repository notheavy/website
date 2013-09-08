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
namespace Application\Listener;

use Locale;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Mvc\I18n\Translator;
use Zend\Mvc\MvcEvent;
use Zend\Validator\AbstractValidator;
use Zend\View\Model\ViewModel;

/**
 * Application listener
 * 
 * Listens on application level
 * 
 * @package    Application
 */
class ApplicationListener implements ListenerAggregateInterface
{
    /**
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = array();

    /**
     * Attach to an event manager
     *
     * @param  EventManagerInterface $events
     *
     * @internal param int $priority
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_RENDER, 
            array($this, 'renderLayoutSegments'),
            -100
        );
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_DISPATCH, 
            array($this, 'setupLocalization'),
            -100
        );
        $this->listeners[] = $events->attach(
            MvcEvent::EVENT_DISPATCH, 
            array($this, 'addValidatorTranslations'), 
            100
        );
    }

    /**
     * Detach all our listeners from the event manager
     *
     * @param  EventManagerInterface $events
     * @return void
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * Listen to the "render" event and render additional layout segments
     *
     * @param \Zend\EventManager\EventInterface|\Zend\Mvc\MvcEvent $e
     *
     * @return null
     */
    public function renderLayoutSegments(EventInterface $e)
    {
        // get view Model
        $viewModel = $e->getViewModel(); /* @var $viewModel ViewModel */

        // add an additional header segment to layout
        $header = new ViewModel();
        $header->setTemplate('layout/header');
        $header->setVariable('lang', Locale::getDefault());
        $viewModel->addChild($header, 'header');
        
        // add an additional sidebar segment to layout
        $sidebar = new ViewModel();
        $sidebar->setTemplate('layout/sidebar');
        $viewModel->addChild($sidebar, 'sidebar');
        
        // add an additional footer segment to layout
        $footer = new ViewModel();
        $footer->setTemplate('layout/footer');
        $viewModel->addChild($footer, 'footer');
        
        // return response
        return $e->getResponse();
    }

    /**
     * Listen to the "dispatch" event and setup the localization
     *
     * @param \Zend\EventManager\EventInterface|\Zend\Mvc\MvcEvent $e
     *
     * @return null
     */
    public function setupLocalization(MvcEvent $e)
    {
        // get service manager
        $serviceManager = $e->getApplication()->getServiceManager();

        // get language
        $lang = $e->getRouteMatch()->getParam('lang', 'de');

        // set locale
        Locale::setDefault($lang);

        // get translator
        $translator = $serviceManager->get('translator');

        // change language
        $translator->setLocale(Locale::getDefault());

        // setup currency view helper
        $viewManager    = $serviceManager->get('viewmanager');
        $helper = $viewManager->getRenderer()->plugin('currencyformat');
        $helper->setCurrencyCode('EUR');
        $helper->setShouldShowDecimals(true);
    }

    /**
     * Listen to the "dispatch" event and add translation files
     *
     * @param \Zend\EventManager\EventInterface|\Zend\Mvc\MvcEvent $e
     *
     * @return null
     */
    public function addValidatorTranslations(EventInterface $e)
    {
        $baseDir = APPLICATION_ROOT . '/module/Application/language';

        $translator = Translator::factory(array(
            'locale'                    => Locale::getDefault(),
            'translation_file_patterns' => array(
                array(
                    'type'        => 'phpArray',
                    'base_dir'    => $baseDir,
                    'pattern'     => 'Zend_Validate.php',
                    'text_domain' => 'default',
                ),
            )
        ));

        AbstractValidator::setDefaultTranslator($translator);
    }
}
