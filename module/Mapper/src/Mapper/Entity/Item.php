<?php

namespace Mapper\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=1250, nullable=true)
     */
    private $uri;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \Mapper\Entity\MetadataItem
     *
     * @ORM\ManyToOne(targetEntity="Mapper\Entity\MetadataItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metadata_item_id", referencedColumnName="id")
     * })
     */
    private $metadataItem;



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
     * Set uri
     *
     * @param string $uri
     * @return Item
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    
        return $this;
    }

    /**
     * Get uri
     *
     * @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Item
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set metadataItem
     *
     * @param \Mapper\Entity\MetadataItem $metadataItem
     * @return Item
     */
    public function setMetadataItem(\Mapper\Entity\MetadataItem $metadataItem = null)
    {
        $this->metadataItem = $metadataItem;
    
        return $this;
    }

    /**
     * Get metadataItem
     *
     * @return \Mapper\Entity\MetadataItem 
     */
    public function getMetadataItem()
    {
        return $this->metadataItem;
    }
}