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
namespace Shop\Filter;

use Zend\InputFilter\InputFilter;

/**
 * Order filter
 * 
 * @package    Shop
 */
class OrderFilter extends InputFilter
{
    /**
     * Build filter
     */
    public function init()
    {
        $this->add(array(
            'name'       => 'comments',
            'required'   => false,
            'filters'    => array(
                array('name' => 'StringTrim'),
                array('name' => 'StringHtmlPurifier'),
            ),
        ));
    }
}
