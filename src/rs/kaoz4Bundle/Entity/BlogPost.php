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
     * @var rs\kaoz4Bundle\Entity\Comment
     */
    protected $comments;

    /**
     * @var rs\kaoz4Bundle\Entity\Tag
     */
    protected $tags;

    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add comments
     *
     * @param rs\kaoz4Bundle\Entity\Comment $comments
     */
    public function addComments( $comments)
    {
        $this->comments[] = $comments;
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add tags
     *
     * @param rs\kaoz4Bundle\Entity\Tag $tags
     */
    public function addTags( $tags)
    {
        $this->tags[] = $tags;
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection $tags
     */
    public function getTags()
    {
        return $this->tags;
    }
}