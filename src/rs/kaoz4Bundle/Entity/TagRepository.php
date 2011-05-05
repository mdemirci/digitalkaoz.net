<?php

namespace rs\kaoz4Bundle\Entity;

use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
    /**
     * finds comments by a post
     * 
     * @param int $id
     * @return Doctrine\Common\Collections\Collection
     */
    public function findByContent($id)
    {
        $qb = $this->createQueryBuilder('t');
        /**
         * @var $qb Doctrine\ORM\QueryBuilder
         */
        return $qb
            //->from('rs\kaoz4Bundle\Entity\Tag', 't')
            ->innerJoin('t.contents','tc', 'WITH','tc.id='.$id)
            ->groupBy('t.id')
            ->getQuery()->execute();
    }    
}