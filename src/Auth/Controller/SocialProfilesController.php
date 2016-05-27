<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2016 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

/** Auth controller */
namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 *
 */
class SocialProfilesController extends AbstractActionController
{
    /**
     * attaches further Listeners for generating / processing the output
     * @return $this
     */
    public function attachDefaultListeners()
    {
        parent::attachDefaultListeners();
        $serviceLocator  = $this->serviceLocator;
        $defaultServices = $serviceLocator->get('DefaultListeners');
        $events          = $this->getEventManager();
        $events->attach($defaultServices);
        return $this;
    }

    public function fetchAction()
    {
        $network = $this->params()->fromQuery('network', false);
        if (!$network) {
            throw new \RuntimeException('Missing required parameter "network"');
        }
        
        $profile = $this->plugin('Auth/SocialProfiles')->fetch($network);
        
        return array(
            'profile' => $profile
        );
    }
}
