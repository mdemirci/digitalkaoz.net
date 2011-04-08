<?php

namespace rs\kaoz4Bundle\Entity;

use Sonata\NewsBundle\Entity\BaseComment;
/**
 * rs\kaoz4Bundle\Entity\Comment
 */
class Comment extends BaseComment
{
    /**
     * @var integer $id
     */
    private $id;
        
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    
}