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
namespace Comment\Filter;

use Zend\InputFilter\InputFilter;

/**
 * Comment filter
 * 
 * @package    Comment
 */
class CommentFilter extends InputFilter
{
    /**
     * Build filter
     */
    public function init()
    {
        $this->add(array(
            'name'       => 'email',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'EmailAddress',
                    'options' => array(
                        'useDomainCheck' => false, 
                        'message'        => 'Keine gültige E-Mail-Adresse',
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name'       => 'name',
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
                        'message'  => 'Name nur 5 - 128 Zeichen erlaubt',
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name'       => 'message',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
                array('name' => 'stringHtmlPurifier'),
            ),
        ));
    }
}
