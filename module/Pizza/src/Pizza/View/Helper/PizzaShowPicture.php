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
 * Show picture view helper
 * 
 * Outputs the picture for a pizza
 * 
 * @package    Pizza
 */
class PizzaShowPicture extends AbstractHelper
{
    /**
     * Outputs the picture for a pizza
     *
     * @return string 
     */
    public function __invoke(PizzaEntityInterface $pizza, $class = '')
    {
        $pictureFile = '/img/uploads/pizza' . $pizza->getId() . '.jpg';
        $picturePath = APPLICATION_ROOT . '/public' . $pictureFile;
        
        if (!file_exists($picturePath))
        {
            $pictureFile = '/img/pizza/keinbild.jpg';
        }
        
        $output = '<img src="' . $pictureFile . '" class="thumbnail ' . $class .'" />';
        
        return $output;
    }
}
