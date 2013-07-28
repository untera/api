<?php

namespace Mapper\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Example
 *
 * @ORM\Table(name="example")
 * @ORM\Entity
 */
class Example
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idexample", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idexample;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="examplecol", type="string", length=45, nullable=true)
     */
    private $examplecol;



    /**
     * Get idexample
     *
     * @return integer 
     */
    public function getIdexample()
    {
        return $this->idexample;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Example
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
     * Set examplecol
     *
     * @param string $examplecol
     * @return Example
     */
    public function setExamplecol($examplecol)
    {
        $this->examplecol = $examplecol;
    
        return $this;
    }

    /**
     * Get examplecol
     *
     * @return string 
     */
    public function getExamplecol()
    {
        return $this->examplecol;
    }
}