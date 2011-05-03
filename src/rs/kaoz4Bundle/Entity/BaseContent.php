<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity
 * @orm:InheritanceType("JOINED")
 * @orm:DiscriminatorColumn(name="discr", type="string")
 * @orm:DiscriminatorMap({"content" = "BaseContent", "post" = "Post", "contribution" = "Contribution", "news" = "News" })
 */
class BaseContent
{
    
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /** @orm:Column(type="string") */
    private $title;
    
    /** @orm:Column(type="text") */
    private $abstract;
    
    /** @orm:Column(type="text") */
    private $content;

    /**
     * @orm:ManyToMany(targetEntity="Tag", inversedBy="contents")
     * @orm:JoinTable(name="content_tag",
     *      joinColumns={@orm:JoinColumn(name="content_id", referencedColumnName="id")},
     *      inverseJoinColumns={@orm:JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    private $tags;
    
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set abstract
     *
     * @param text $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * Get abstract
     *
     * @return text $abstract
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text $content
     */
    public function getContent()
    {
        return $this->content;
    }
        
    /**
     * Add a tag
     *
     * @param rs\kaoz4Bundle\Entity\Tag $tag
     */
    public function addTag(\rs\kaoz4Bundle\Entity\Tag $tag)
    {
        $this->tags[] = $tags;
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add tags
     *
     * @param rs\kaoz4Bundle\Entity\Tag $tags
     */
    public function addTags(\rs\kaoz4Bundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    }
}