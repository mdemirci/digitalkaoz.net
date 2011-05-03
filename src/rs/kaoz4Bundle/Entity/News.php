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
    
    /** @orm:Column(type="string") */
    private $news;
    
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
     * Set news
     *
     * @param string $news
     */
    public function setNews($news)
    {
        $this->news = $news;
    }

    /**
     * Get news
     *
     * @return string $news
     */
    public function getNews()
    {
        return $this->news;
    }
}