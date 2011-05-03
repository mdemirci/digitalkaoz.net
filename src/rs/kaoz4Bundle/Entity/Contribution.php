<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity(repositoryClass="rs\kaoz4Bundle\Entity\BaseContentRepository")
 */
class Contribution extends BaseContent
{        
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     */
    private $id;
    
    /** @orm:Column(type="string", nullable=true) */
    private $url;
    
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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
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