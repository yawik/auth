<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2016 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

namespace Auth\Factory\Adapter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Auth\Adapter\ExternalApplication;

/**
 * authentication adapter factory
 */
class ExternalApplicationAdapterFactory implements FactoryInterface
{

    /**
     * Creates an instance of \Auth\Adapter\ExternalApplication
     *
     * - injects the UserRepository fetched from the service manager.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Auth\Adapter\ExternalApplication
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $repository = $serviceLocator->get('repositories')->get('Auth/User');
        $adapter = new ExternalApplication($repository);
        $adapter->setServiceLocator($serviceLocator);
        $config  = $serviceLocator->get('Config');
        if (isset($config['Auth']['external_applications']) && is_array($config['Auth']['external_applications'])) {
            $adapter->setApplicationKeys($config['Auth']['external_applications']);
        }
        
        return $adapter;
    }
}
