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
     * @var rs\kaoz4Bundle\Entity\BlogPost
     */
    protected $post;


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
     * Set post
     *
     * @param rs\kaoz4Bundle\Entity\BlogPost $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return rs\kaoz4Bundle\Entity\BlogPost $post
     */
    public function getPost()
    {
        return $this->post;
    }
}