<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity(repositoryClass="rs\kaoz4Bundle\Entity\BaseContentRepository")
 * @orm:InheritanceType("JOINED")
 * @orm:DiscriminatorColumn(name="discr", type="string")
 * @orm:DiscriminatorMap({"post" = "Post", "contribution" = "Contribution"})
 * @orm:HasLifecycleCallbacks
 */
class BaseContent
{    
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @orm:Column(type="string", unique=true) 
     * @orm:Index
     */
    private $slug;
    
    /** @orm:Column(type="string") */
    private $title;
    
    /** @orm:Column(type="text") */
    private $abstract;
    
    /** @orm:Column(type="text") */
    private $content;
    
    /** @orm:Column(type="boolean") */
    private $enabled;

    /** @orm:Column(type="boolean") */
    private $comments_enabled;
    
    /** @orm:Column(type="boolean") */
    private $tags_enabled;
    
    /** 
     * @orm:Column(type="datetime") 
     * @todo doctrine extension
     */
    private $created_at;
    
    /** 
     * @orm:Column(type="datetime") 
     * @todo doctrine extension
     */
    private $updated_at;
    
    /** 
     * @orm:Column(type="datetime", nullable=true) 
     * @todo doctrine extension
     */
    private $deleted_at;
    
    /**
     * @orm:ManyToMany(targetEntity="Tag", inversedBy="contents")
     */
    private $tags;
    
    /**
     * @orm:OneToMany(targetEntity="Comment", mappedBy="content", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    private $comments;
    
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
        $this->tags[] = $tag;
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
    public function addTags(Doctrine\Common\Collections\Collection $tags)
    {
        $this->tags = array_merge($this->getTags(), $tags);
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean $enabled
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set comments_enabled
     *
     * @param boolean $commentsEnabled
     */
    public function setCommentsEnabled($commentsEnabled)
    {
        $this->comments_enabled = $commentsEnabled;
    }

    /**
     * Get comments_enabled
     *
     * @return boolean $commentsEnabled
     */
    public function getCommentsEnabled()
    {
        return $this->comments_enabled;
    }

    /**
     * Set tags_enabled
     *
     * @param boolean $tagsEnabled
     */
    public function setTagsEnabled($tagsEnabled)
    {
        $this->tags_enabled = $tagsEnabled;
    }

    /**
     * Get tags_enabled
     *
     * @return boolean $tagsEnabled
     */
    public function getTagsEnabled()
    {
        return $this->tags_enabled;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    
    /**
     * Set deleted_at
     *
     * @param datetime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;
    }

    /**
     * Get deleted_at
     *
     * @return datetime $deletedAt
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Add a comment
     *
     * @param rs\kaoz4Bundle\Entity\Comment $comments
     */
    public function addComment(\rs\kaoz4Bundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
    }

    /**
     * Add comments
     *
     * @param Doctrine\Common\Collections\Collection $comments
     */
    public function addComments(Doctrine\Common\Collections\Collection $comments)
    {
        $this->comments = array_merge($this->getComments(),$comments);
    }
    
    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection $comments
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    public function enable()
    {
        $this->setEnabled(true);
    }
    
    public function disable()
    {
        $this->setEnabled(false);
    }

    /**
     * @orm:PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime);
        $this->setUpdatedAt(new \DateTime);
        $this->setSlug($this->sluggify());
    }
    
    public function sluggify()
    {
        $text = $this->getTitle();
        
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        if (function_exists('iconv'))
        {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
        return 'n-a';
        }

        return $text;
    }

    /**
     * @orm:PreUpdate
     */
    public function preUpdate()
    {
        $this->setUpdatedAt(new \DateTime);
        $this->setSlug($this->sluggify());
    }
    

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    public function __toString()
    {
        return $id;
    }
    
    public function getYear()
    {
        return $this->getCreatedAt()->format('Y');
    }

    public function getMonth()
    {
        return $this->getCreatedAt()->format('m');
    }

    public function getDay()
    {
        return $this->getCreatedAt()->format('d');
    }
}