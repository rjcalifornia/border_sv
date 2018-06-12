<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Redconsular
 *
 * @ORM\Table(name="redconsular")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RedconsularRepository")
 */
class Redconsular
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumn(name="paisid", referencedColumnName="id")
     */
    private $paisid;

   

    /**
     * @var string
     *
     * @ORM\Column(name="nombremapa", type="string", length=700, nullable=true)
     */
    private $nombremapa;

    /**
     * @var string
     *
     * @ORM\Column(name="useradic", type="string", length=400, nullable=true)
     */
    private $useradic;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigomapa", type="string", length=400, nullable=true)
     */
    private $codigomapa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaadic", type="datetime", nullable=true)
     */
    private $fechaadic;

   


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set paisid
     *
     * @param \AppBundle\Entity\Paises $paisid
     *
     * @return Redconsular
     */
    public function setPaisid(\AppBundle\Entity\Paises $paisid = null)
    {
        $this->paisid = $paisid;

        return $this;
    }

    /**
     * Get paisid
     *
     * @return \AppBundle\Entity\Paises
     */
    public function getPaisid()
    {
        return $this->paisid;
    }

    
    /**
     * Set nombremapa
     *
     * @param string $nombremapa
     *
     * @return Redconsular
     */
    public function setNombremapa($nombremapa)
    {
        $this->nombremapa = $nombremapa;

        return $this;
    }

    /**
     * Get nombremapa
     *
     * @return string
     */
    public function getNombremapa()
    {
        return $this->nombremapa;
    }

   
    /**
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Redconsular
     */
    public function setUseradic($useradic)
    {
        $this->useradic = $useradic;

        return $this;
    }

    /**
     * Get useradic
     *
     * @return string
     */
    public function getUseradic()
    {
        return $this->useradic;
    }

    /**
     * Set fechaadic
     *
     * @param \DateTime $fechaadic
     *
     * @return Redconsular
     */
    public function setFechaadic($fechaadic)
    {
        $this->fechaadic = $fechaadic;

        return $this;
    }

    /**
     * Get fechaadic
     *
     * @return \DateTime
     */
    public function getFechaadic()
    {
        return $this->fechaadic;
    }

    

    /**
     * Set codigomapa
     *
     * @param string $codigomapa
     *
     * @return Redconsular
     */
    public function setCodigomapa($codigomapa)
    {
        $this->codigomapa = $codigomapa;

        return $this;
    }

    /**
     * Get codigomapa
     *
     * @return string
     */
    public function getCodigomapa()
    {
        return $this->codigomapa;
    }
}
