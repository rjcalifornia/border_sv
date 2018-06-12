<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Codigos
 *
 * @ORM\Table(name="codigos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CodigosRepository")
 */
class Codigos
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
     * @var string
     *
     * @ORM\Column(name="bandera", type="string", length=255, nullable=true)
     */
    private $bandera;

    /**
     * @var \AppBundle\Entity\Paises
     * 
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumn(name="paisid", referencedColumnName="id")
     */
    private $paisid;

    /**
     * @var string
     *
     * @ORM\Column(name="iso", type="string", length=400, nullable=true)
     */
    private $iso;

    /**
     * @var string
     *
     * @ORM\Column(name="useradic", type="string", length=500, nullable=true)
     */
    private $useradic;

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
     * Set bandera
     *
     * @param string $bandera
     *
     * @return Codigos
     */
    public function setBandera($bandera)
    {
        $this->bandera = $bandera;

        return $this;
    }

    /**
     * Get bandera
     *
     * @return string
     */
    public function getBandera()
    {
        return $this->bandera;
    }

    /**
     * Set paisid
     *
     * @param \AppBundle\Entity\Paises $paisid
     *
     * @return Codigos
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
     * Set iso
     *
     * @param string $iso
     *
     * @return Codigos
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso
     *
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Codigos
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
     * @return Codigos
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
}

