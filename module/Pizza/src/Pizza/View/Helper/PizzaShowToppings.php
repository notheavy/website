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
namespace Pizza\View\Helper;

use Pizza\Entity\PizzaEntityInterface;
use Zend\View\Helper\AbstractHelper;

/**
 * Show toppings view helper
 * 
 * Outputs the toppings for a pizza
 * 
 * @package    Pizza
 */
class PizzaShowToppings extends AbstractHelper
{
    /**
     * Outputs the toppings for a pizza
     *
     * @return string 
     */
    public function __invoke(PizzaEntityInterface $pizza)
    {
        if (count($pizza->getToppings()) == 0) {
            return '-';
        }
        
        $output = '';
        
        $count = count($pizza->getToppings());
        
        foreach ($pizza->getToppings() as $key => $topping) {
            $output .= $topping->getName();
            $output .= ($count > 1) ? ', ' : '';
            $count--;
        }
        
        return $output;
    }
}