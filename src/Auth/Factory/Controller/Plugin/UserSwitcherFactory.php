<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Auth\Factory\Controller\Plugin;

use Auth\Controller\Plugin\UserSwitcher;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class UserSwitcherFactory implements FactoryInterface
{

    /**
     * Create an UserSwitcher plugin.
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array              $options
     *
     * @return UserSwitcher
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $auth   = $container->get('AuthenticationService');
        $plugin = new UserSwitcher($auth);

        return $plugin;
    }

    /**
     * Create an UserSwitcher plugin.
     *
     * @param \Zend\ServiceManager\AbstractPluginManager|ServiceLocatorInterface $serviceLocator
     *
     * @return UserSwitcher
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator->getServiceLocator(), 'Auth/User/Switcher');
    }
}