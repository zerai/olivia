<?php

namespace Zlab\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ebook;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ebook = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add ebook
     *
     * @param \Zlab\FrontendBundle\Entity\Ebook $ebook
     * @return Category
     */
    public function addEbook(\Zlab\FrontendBundle\Entity\Ebook $ebook)
    {
        $this->ebook[] = $ebook;
    
        return $this;
    }

    /**
     * Remove ebook
     *
     * @param \Zlab\FrontendBundle\Entity\Ebook $ebook
     */
    public function removeEbook(\Zlab\FrontendBundle\Entity\Ebook $ebook)
    {
        $this->ebook->removeElement($ebook);
    }

    /**
     * Get ebook
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEbook()
    {
        return $this->ebook;
    }

    public function __toString()
    {
      return $this->getName();
    }
}
