<?php
/**
 * Website Zend\Together
 *
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Table;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * PizzaTopping table interface
 * 
 * Handles the pizzas_toppings table for the Pizza module 
 * 
 * @package    Pizza
 */
interface PizzaToppingTableInterface extends TableGatewayInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter);
    
    /**
     * Save toppings for pizza
     * 
     * @param integer $pizzaId id of pizza
     * @return PizzaEntityInterface
     */
    public function savePizzaToppings($pizzaId, $currentToppings, $newToppings);
}
