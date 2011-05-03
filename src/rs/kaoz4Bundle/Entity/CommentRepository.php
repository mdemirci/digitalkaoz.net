<?php

namespace rs\kaoz4Bundle\Entity;

use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    /**
     * finds comments by a post
     * 
     * @param int $post_id
     * @return Doctrine\Common\Collections\Collection
     */
    public function findByPost($post_id)
    {
        return $this->findByContent($post_id,'post')->execute();
    }
    
    /**
     * find a content based on its class and id
     * 
     * @param int $id
     * @param string $class
     * @return Doctrine\ORM\QueryBuilder 
     */
    protected function findByContent($id, $class)
    {
        return $this->createQueryBuilder('c')
            ->where('c.content = :'.$class.'_id')
            ->orderBy('c.created_at', 'ASC')
            ->getQuery()
            ->setParameters(array(
                $class.'_id'   => $id,
            ));
    }
}