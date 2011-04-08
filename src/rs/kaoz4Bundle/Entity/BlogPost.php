<?php

namespace rs\kaoz4Bundle\Entity;

use Sonata\NewsBundle\Entity\BasePost;

/**
 * rs\kaoz4Bundle\Entity\BlogPost
 */
class BlogPost extends BasePost
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