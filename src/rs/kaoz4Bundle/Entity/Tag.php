<?php

namespace rs\kaoz4Bundle\Entity;

/**
 * @orm:Entity(repositoryClass="rs\kaoz4Bundle\Entity\TagRepository")
 */
class Tag
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /** @orm:Column(type="string") */
    private $name;
    
    /**
     * @orm:ManyToMany(targetEntity="BaseContent", mappedBy="tags")
     */
    private $contents;
    
    public function __construct()
    {
        $this->contents = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->getName();
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
     * Add a content
     *
     * @param rs\kaoz4Bundle\Entity\BaseContent $content
     */
    public function addContent(\rs\kaoz4Bundle\Entity\BaseContent $content)
    {
        $this->contents[] = $content;
    }

    /**
     * Get contents
     *
     * @return Doctrine\Common\Collections\Collection $contents
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Add contents
     *
     * @param rs\kaoz4Bundle\Entity\BaseContent $contents
     */
    public function addContents(\rs\kaoz4Bundle\Entity\BaseContent $contents)
    {
        $this->contents[] = $contents;
    }
}