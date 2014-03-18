<?php
/**
 * Cross Applicant Management
 *
 * @filesource
 * @copyright (c) 2013 Cross Solution (http://cross-solution.de)
 * @license   AGPLv3
 */

/** GroupFieldset.php */ 
namespace Auth\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Core\Entity\Hydrator\EntityHydrator;

class GroupFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function init()
    {
        $this->setName('data')
             ->setLabel('Group data')
             ->setUseAsBaseFieldset(true)
             ->setHydrator(new EntityHydrator());
        
        $this->add(array(
            'type' => 'Text',
            'name' => 'name',
            'options' => array(
                'label' => /*@translate*/ 'Name',
            ),
        ));
        
        $this->add(array(
            'type' => 'Auth/Group/Users',
        ));
        
    }
    
    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
                'validators' => array(
                    array('name'    => 'Auth/Form/UniqueGroupName',
                          'options' => array(
                            'allowName' => 'edit' == $this->getOption('mode') 
                                          ? $this->getObject()->getName()
                                          : null
                            )
                    ),
                ),
            ),
        );
    }
}

