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
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * PizzaTopping table
 * 
 * Handles the pizzas_toppings table for the Pizza module 
 * 
 * @package    Pizza
 */
class PizzaToppingTable extends TableGateway implements PizzaToppingTableInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter)
    {
        parent::__construct('pizzas_toppings', $adapter);
    }
    
    /**
     * Save toppings for pizza
     * 
     * @param integer $pizzaId id of pizza
     * @return PizzaEntityInterface
     */
    public function savePizzaToppings($pizzaId, $currentToppings, $newToppings)
    {
        // get toppings to delete and to insert
        $deleteToppings = array_diff($currentToppings, $newToppings);
        $insertToppings = array_diff($newToppings, $currentToppings);
        
        // check for deletion
        if (count($deleteToppings) > 0) {
            // build delete sql
            $delete = $this->getSql()->delete();
            $delete->where->equalTo('pizza_id', $pizzaId);
            $delete->where->in('topping_id', $deleteToppings);
            
            // delete toppings
            $this->deleteWith($delete);
        }
        
        // loop through insert toppings
        foreach ($insertToppings as $toppingId) {
            // build insert sql
            $insert = $this->getSql()->insert();
            $insert->values(array(
                'pizza_id'   => $pizzaId,
                'topping_id' => $toppingId,
            ));
            
            // insert toppings
            $this->insertWith($insert);
        }
        
        return true;
    }
}
