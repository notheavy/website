<?php
/**
 * Website Zend\Together
 *
 * @package    Blog
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Blog\Filter;

namespace Blog\Filter;

use Zend\InputFilter\InputFilter;

/**
 * Blog filter
 * 
 * @package    Blog
 */
class BlogFilter extends InputFilter
{
    /**
     * Add elements filter
     */
    public function init()
    {
        $this->add(array(
            'name'       => 'title',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8', 'min' => 5, 'max' => 128,
                        'message'  => 'Überschrift nur 5 - 128 Zeichen erlaubt',
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name'       => 'teaser',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
                array('name' => 'StringHtmlPurifier'),
            ),
        ));
        
        $this->add(array(
            'name'       => 'content',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
                array('name' => 'StringHtmlPurifier'),
            ),
        ));
    }
}
