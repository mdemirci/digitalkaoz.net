<?php

namespace rs\kaoz4Bundle\Entity;

use Sonata\NewsBundle\Entity\BaseTag;

/**
 * rs\kaoz4Bundle\Entity\Tag
 */
class Tag extends BaseTag
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var rs\kaoz4Bundle\Entity\BlogPost
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add posts
     *
     * @param rs\kaoz4Bundle\Entity\BlogPost $posts
     */
    public function addPosts( $posts)
    {
        $this->posts[] = $posts;
    }

    /**
     * Get posts
     *
     * @return Doctrine\Common\Collections\Collection $posts
     */
    public function getPosts()
    {
        return $this->posts;
    }
}