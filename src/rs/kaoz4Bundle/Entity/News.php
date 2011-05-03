<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity(repositoryClass="rs\kaoz4Bundle\Entity\BaseContentRepository")
 */
class News extends BaseContent
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     */
    private $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return parent::getId();
    }
    

    /**
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}