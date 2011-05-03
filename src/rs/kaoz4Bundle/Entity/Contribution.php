<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity
 */
class Contribution extends BaseContent
{    
    /** @orm:Column(type="string", nullable=true) */
    private $url;
    
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
}