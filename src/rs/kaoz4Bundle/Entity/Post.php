<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity(repositoryClass="rs\kaoz4Bundle\Entity\PostRepository")
 */
class Post extends BaseContent
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     */
    private $id;


    /**
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        parent::setId($id);
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return parent::getId();
    }
}