<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity
 */
class News extends BaseContent
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
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