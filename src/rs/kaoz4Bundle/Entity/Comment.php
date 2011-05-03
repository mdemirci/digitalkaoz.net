<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity
 */
class Comment
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /** @orm:Column(type="string") */
    private $email;

    /** @orm:Column(type="string") */
    private $homepage;
    
    /** @orm:Column(type="string") */
    private $name;

    /** @orm:Column(type="text") */
    private $text;
    
    /** 
     * @orm:Column(type="datetime") 
     * @todo doctrine extension
     */
    private $created_at;
    
    /** 
     * @orm:Column(type="datetime") 
     * @todo doctrine extension
     */
    private $deleted_at;
        
    /**
     * @orm:ManyToOne(targetEntity="BaseContent", inversedBy="comment")
     */
    private $content;
        

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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * Get homepage
     *
     * @return string $homepage
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text $text
     */
    public function getText()
    {
        return $this->text;
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
     * Set content
     *
     * @param rs\kaoz4Bundle\Entity\BaseContent $content
     */
    public function setContent(\rs\kaoz4Bundle\Entity\BaseContent $content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return rs\kaoz4Bundle\Entity\BaseContent $content
     */
    public function getContent()
    {
        return $this->content;
    }
}