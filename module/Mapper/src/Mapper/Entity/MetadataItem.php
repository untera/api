<?php

namespace Mapper\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetadataItem
 *
 * @ORM\Table(name="metadata_item")
 * @ORM\Entity
 */
class MetadataItem
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
     * @ORM\Column(name="first_user", type="string", length=45, nullable=true)
     */
    private $firstUser;



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
     * Set firstUser
     *
     * @param string $firstUser
     * @return MetadataItem
     */
    public function setFirstUser($firstUser)
    {
        $this->firstUser = $firstUser;
    
        return $this;
    }

    /**
     * Get firstUser
     *
     * @return string 
     */
    public function getFirstUser()
    {
        return $this->firstUser;
    }
}