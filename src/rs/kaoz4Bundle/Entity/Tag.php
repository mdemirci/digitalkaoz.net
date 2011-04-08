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
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

}