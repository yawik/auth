<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013-2104 Cross Solution (http://cross-solution.de)
 * @license   AGPLv3
 */

/** Group.php */ 
namespace Auth\Form;

use Core\Form\Form;
use Zend\Form\Fieldset;
use Core\Entity\Hydrator\EntityHydrator;

/**
 * Form to manage groups.
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 */
class Group extends Form 
{
    
    /**
     * Initialises the form.
     * @see \Zend\Form\Element::init()
     */
    public function init()
    {

        $this->add(array(
            'type' => 'Auth/Group/Data',
            'options' => array(
                'mode' => $this->getOption('mode')
            ),
        ));

        $this->add(array(
            'type' => 'DefaultButtonsFieldset',
        ));
    }
    
  
}

