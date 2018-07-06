<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requisitosviaje
 *
 * @ORM\Table(name="requisitosviaje")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RequisitosviajeRepository")
 */
class Requisitosviaje
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
     * @var \AppBundle\Entity\Paises
     * 
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumn(name="paisid", referencedColumnName="id")
     */
    private $paisid;

    /**
     * @var string
     *
     * @ORM\Column(name="mapa", type="string", length=300, nullable=true)
     */
    private $mapa;

    /**
     * @var string
     *
     * @ORM\Column(name="codigointerno", type="string", length=900, nullable=true)
     */
    private $codigointerno;

    /**
     * @var string
     *
     * @ORM\Column(name="pasaportedestino", type="string", length=900, nullable=true)
     */
    private $pasaportedestino;

    /**
     * @var string
     *
     * @ORM\Column(name="visadestino", type="string", length=900, nullable=true)
     */
    private $visadestino;

    /**
     * @var string
     *
     * @ORM\Column(name="destinosalud", type="string", length=2200, nullable=true)
     */
    private $destinosalud;

    /**
     * @var string
     *
     * @ORM\Column(name="useradic", type="string", length=300, nullable=true)
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
     * @ORM\Column(name="usermodi", type="string", length=300, nullable=true)
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
     * @return Requisitosviaje
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
     * Set mapa
     *
     * @param string $mapa
     *
     * @return Requisitosviaje
     */
    public function setMapa($mapa)
    {
        $this->mapa = $mapa;

        return $this;
    }

    /**
     * Get mapa
     *
     * @return string
     */
    public function getMapa()
    {
        return $this->mapa;
    }

    /**
     * Set codigointerno
     *
     * @param string $codigointerno
     *
     * @return Requisitosviaje
     */
    public function setCodigointerno($codigointerno)
    {
        $this->codigointerno = $codigointerno;

        return $this;
    }

    /**
     * Get codigointerno
     *
     * @return string
     */
    public function getCodigointerno()
    {
        return $this->codigointerno;
    }

    /**
     * Set pasaportedestino
     *
     * @param string $pasaportedestino
     *
     * @return Requisitosviaje
     */
    public function setPasaportedestino($pasaportedestino)
    {
        $this->pasaportedestino = $pasaportedestino;

        return $this;
    }

    /**
     * Get pasaportedestino
     *
     * @return string
     */
    public function getPasaportedestino()
    {
        return $this->pasaportedestino;
    }

    /**
     * Set visadestino
     *
     * @param string $visadestino
     *
     * @return Requisitosviaje
     */
    public function setVisadestino($visadestino)
    {
        $this->visadestino = $visadestino;

        return $this;
    }

    /**
     * Get visadestino
     *
     * @return string
     */
    public function getVisadestino()
    {
        return $this->visadestino;
    }

    /**
     * Set destinosalud
     *
     * @param string $destinosalud
     *
     * @return Requisitosviaje
     */
    public function setDestinosalud($destinosalud)
    {
        $this->destinosalud = $destinosalud;

        return $this;
    }

    /**
     * Get destinosalud
     *
     * @return string
     */
    public function getDestinosalud()
    {
        return $this->destinosalud;
    }

    /**
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Requisitosviaje
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
     * @return Requisitosviaje
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
     * @return Requisitosviaje
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
     * @return Requisitosviaje
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
}

