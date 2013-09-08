<?php
/**
 * Website Zend\Together
 *
 * @package    Shop
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Shop\Controller\Plugin;

use Shop\Service\BasketServiceInterface;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Provides access to the BasketService
 * 
 * @package    Shop
 */
class Basket extends AbstractPlugin
{
    /**
     * @var BasketServiceInterface
     */
    protected $basketService;

    /**
     * Constructor
     *
     * @param  BasketServiceInterface $basketService
     */
    public function __construct(BasketServiceInterface $basketService)
    {
        $this->setBasketService($basketService);
    }

    /**
     * Sets shop basketService
     *
     * @param  BasketServiceInterface $basketService
     * @return AbstractHelper
     */
    public function setBasketService(BasketServiceInterface $basketService = null)
    {
        $this->basketService = $basketService;
        return $this;
    }
    
    /**
     * Returns BasketService
     *
     * @return BasketServiceInterface
     */
    public function getBasketService()
    {
        return $this->basketService;
    }
    
    /**
     * Returns itself
     *
     * @return Shop 
     */
    public function __invoke()
    {
        // return plugin
        return $this;
    }
    
    /**
     * Add position to basket
     * 
     * @param object $position position to be added
     */
    public function add($position)
    {
        return $this->getBasketService()->add($position);
    }
    
    /**
     * Remove position from basket
     * 
     * @param integer $key position key
     */
    public function remove($key)
    {
        return $this->getBasketService()->remove($key);
    }
}
