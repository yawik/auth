<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 Cross Solution (http://cross-solution.de)
 * @license   AGPLv3
 */

/** AssertionManager.php */ 
namespace Acl\Assertion;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\Permissions\Acl\Assertion\AssertionInterface;

class AssertionManager extends AbstractPluginManager
{
    public function validatePlugin($plugin)
    {
        if (!$plugin instanceOf AssertionInterface) {
            throw new \RuntimeException('Expected plugin to be of type Assertion.');
        }
    }
}

