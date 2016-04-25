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
use Auth\Adapter\HybridAuth as HybridAuthAdapter;

/**
 * HybridAuth authentication adapter factory
 */
class HybridAuthAdapterFactory implements FactoryInterface
{

    /**
     * Creates an instance of \Auth\Adapter\HybridAuth
     *
     * - injects the \HybridAuth
     * - injects the UserMapper fetched from the service manager.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Auth\Adapter\HybridAuth
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = new HybridAuthAdapter();
        $adapter->setHybridAuth($serviceLocator->get('HybridAuth'));
        $adapter->setRepository($serviceLocator->get('repositories')->get('Auth/User'));
        $adapter->setSocialProfilePlugin($serviceLocator->get('ControllerPluginManager')->get('Auth/SocialProfiles'));
        return $adapter;
    }
}
