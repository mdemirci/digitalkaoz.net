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

}