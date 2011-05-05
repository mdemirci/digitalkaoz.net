<?php

namespace rs\kaoz4Bundle\Entity;

use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
    /**
     * find tags by a content id
     * 
     * @param int $id
     * @return Doctrine\Common\Collections\Collection
     */
    public function findByContentId($id)
    {
        /**
         * @var $qb Doctrine\ORM\QueryBuilder
         */
        return $this->createQueryBuilder('t')
            ->innerJoin('t.contents','tc', 'WITH','tc.id= :id')
            ->groupBy('t.id')
            ->getQuery()
            ->setParameter('id', $id)
            ->execute()
        ;                
    }    
    
    /**
     * find tags by its content class
     * 
     * @param string $class
     * @return Doctrine\Common\Collections\Collection
     */
    public function findByContentClass($class)
    {
        //return $this->findBy(array('discr'=>$class));
        
        /**
         * @var $qb Doctrine\ORM\QueryBuilder
         */
        return $this->createQueryBuilder('t')
            ->innerJoin('t.contents','tc')
            ->groupBy('t.id')
            ->getQuery()
            //->setParameter('class', $class)
            ->execute()
        ;                
    }    
}