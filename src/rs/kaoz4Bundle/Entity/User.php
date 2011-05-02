<?php

namespace rs\kaoz4Bundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

/**
 * rs\kaoz4Bundle\Entity\User
 */
class User extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;


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