<?php
/**
 * Website Zend\Together
 *
 * @package    User
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace User\Filter;

use Zend\InputFilter\InputFilter;

/**
 * User filter
 * 
 * @package    User
 */
class UserFilter extends InputFilter
{
    /**
     * Build filter
     */
    public function __construct()
    {
        $this->add(array(
            'name'       => 'role',
            'required'   => true,
            'validators' => array(
                array(
                    'name'    => 'InArray',
                    'options' => array(
                        'haystack' => array('guest', 'participant', 'staff', 'admin'),
                    ),
                ),
            ),
        ));
        
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
                        'message'        => 'user_message_email_invalid',
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name'       => 'pass',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8', 
                        'min'      => 5, 
                        'max'      => 128,
                        'message'  => 'user_message_password_invalid',
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name'       => 'firstname',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8', 
                        'min'      => 1, 
                        'max'      => 64,
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name'       => 'lastname',
            'required'   => true,
            'filters'    => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8', 
                        'min'      => 1, 
                        'max'      => 64,
                    ),
                ),
            ),
        ));
    }
}
