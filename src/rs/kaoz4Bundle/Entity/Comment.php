<?php

namespace rs\kaoz4Bundle\Entity;

use Sonata\NewsBundle\Entity\BaseComment;

/**
 * rs\kaoz4Bundle\Entity\Comment
 */
class Comment extends BaseComment
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $news_class
     */
    private $news_class;

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
     * Set news_class
     *
     * @param string $newsClass
     */
    public function setNewsClass($newsClass)
    {
        $this->news_class = $newsClass;
    }

    /**
     * Get news_class
     *
     * @return string $newsClass
     */
    public function getNewsClass()
    {
        return $this->news_class;
    }

}