<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Edison
 *
 * @ORM\Table(name="edison")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EdisonRepository")
 */
class Edison
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
     * @ORM\Column(name="codigomapa", type="string", length=400, nullable=true)
     */
    private $codigomapa;


    /**
     * @var string
     *
     * @ORM\Column(name="nombremapa", type="string", length=400, nullable=true)
     */
    private $nombremapa;

    /**
     * @var string
     *
     * @ORM\Column(name="useradic", type="string", length=400, nullable=true)
     */
    private $useradic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaadic", type="datetime", nullable=true)
     */
    private $fechaadic;

    /**
     * @var string
     *
     * @ORM\Column(name="usermodi", type="string", length=400, nullable=true)
     */
    private $usermodi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechamodi", type="datetime", nullable=true)
     */
    private $fechamodi;


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
     * @return Edison
     */
    public function setPaisid(\AppBundle\Entity\Paises $paisid)
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
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Edison
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
     * @return Edison
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
     * Set usermodi
     *
     * @param string $usermodi
     *
     * @return Edison
     */
    public function setUsermodi($usermodi)
    {
        $this->usermodi = $usermodi;

        return $this;
    }

    /**
     * Get usermodi
     *
     * @return string
     */
    public function getUsermodi()
    {
        return $this->usermodi;
    }

    /**
     * Set fechamodi
     *
     * @param \DateTime $fechamodi
     *
     * @return Edison
     */
    public function setFechamodi($fechamodi)
    {
        $this->fechamodi = $fechamodi;

        return $this;
    }

    /**
     * Get fechamodi
     *
     * @return \DateTime
     */
    public function getFechamodi()
    {
        return $this->fechamodi;
    }
    
    /**
     * Set codigomapa
     *
     * @param string $codigomapa
     *
     * @return Edison
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
    
    /**
     * Set nombremapa
     *
     * @param string $nombremapa
     *
     * @return Edison
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


}

