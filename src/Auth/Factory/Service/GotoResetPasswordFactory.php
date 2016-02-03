<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2016 Cross Solution (http://cross-solution.de)
 * @license       MIT
 */

namespace Auth\Factory\Service;

use Auth\Repository;
use Auth\Service\ForgotPassword;
use Auth\Service\GotoResetPassword;
use Core\Controller\Plugin;
use Core\Repository\RepositoryService;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GotoResetPasswordFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return ForgotPassword
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var RepositoryService $repositoryService
         */
        $repositoryService = $serviceLocator->get('repositories');
        $authenticationService = new AuthenticationService();

        return new GotoResetPassword($repositoryService, $authenticationService);
    }
}
