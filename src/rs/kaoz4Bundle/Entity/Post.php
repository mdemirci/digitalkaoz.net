<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity
 */
class Post extends BaseContent
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */    
    private $id;
    
    /** @orm:Column(type="string") */
    private $post;
    
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
     * @param string $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return string $post
     */
    public function getPost()
    {
        return $this->post;
    }
}