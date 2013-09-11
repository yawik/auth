<?php

namespace Auth\Repository\EntityBuilder;

use Zend\ServiceManager\FactoryInterface;
use Core\Repository\EntityBuilder\RelationAwareBuilder as Builder;
use Core\Repository\Hydrator;
use Core\Entity\RelationEntity;


class InfoBuilderFactory implements FactoryInterface
{
	/* (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService (\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        
        $hydrator = new Hydrator\EntityHydrator();
        
        $builder = new Builder(
            $hydrator, 
            new \Auth\Entity\Info()
        );
        
        $builder->setRelation(new RelationEntity(
            array($serviceLocator->getServiceLocator()->get('mappers')->get('user'), 'findInfo')
        ), 'id');
        
        
        return $builder;
    }

    
}