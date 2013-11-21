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
namespace User\Table;

use User\Entity\UserEntityInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * User table interface
 * 
 * Handles the users table for the User module 
 * 
 * @package    User
 */
interface UserTableInterface extends TableGatewayInterface
{
    /**
     * Constructor
     * 
     * @param Adapter $adapter database adapter
     */
    public function __construct(Adapter $adapter, UserEntityInterface $entity);
    
    /**
     * Fetch single user by email
     * 
     * @param varchar $email email address of user
     * @return UserEntityInterface
     */
    public function fetchSingleByEmail($email);
    
    /**
     * Fetch single user by id
     * 
     * @param integer $id id ofuser
     * @return UserEntityInterface
     */
    public function fetchSingleById($id);
}
