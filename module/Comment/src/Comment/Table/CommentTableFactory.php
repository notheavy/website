<?php
/**
 * Website Zend\Together
 *
 * @package    Comment
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Comment\Table;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Comment table factory
 * 
 * Generates the Comment table object
 * 
 * @package    Comment
 */
class CommentTableFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $entity  = $serviceLocator->get('Comment\Entity\Comment');
        $table   = new CommentTable($adapter, $entity);
        return $table;
    }
}
