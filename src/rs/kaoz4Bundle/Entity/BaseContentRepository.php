<?php

namespace rs\kaoz4Bundle\Entity;

use Doctrine\ORM\EntityRepository;

class BaseContentRepository extends EntityRepository
{
    /**
     *
     * @param int $limit
     * @return Doctrine\ORM\QueryBuilder
     */
    public function last($limit = 25)
    {
        return $this->createQueryBuilder('p')
            ->where('p.enabled = true')
            ->orderby('p.created_at', 'DESC')
            ->setMaxResults($limit)
            ;        
    }
}