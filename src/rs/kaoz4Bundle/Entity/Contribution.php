<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity
 */
class Contribution extends BaseContent
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /** @orm:Column(type="string") */
    private $contrib;
    
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
     * Set contrib
     *
     * @param string $contrib
     */
    public function setContrib($contrib)
    {
        $this->contrib = $contrib;
    }

    /**
     * Get contrib
     *
     * @return string $contrib
     */
    public function getContrib()
    {
        return $this->contrib;
    }
}