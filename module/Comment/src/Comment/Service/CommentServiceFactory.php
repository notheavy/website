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
namespace Comment\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Create comment service factory
 * 
 * @package    Comment
 */
class CommentServiceFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $table     = $serviceLocator->get('Comment\Table\Comment');
        $config    = $serviceLocator->get('Config');
        $b8Service = $serviceLocator->get('SpamCheck\Service\B8');
        $service   = new CommentService(
            $table, $config['comment'], $b8Service
        );
        return $service;
    }
}
