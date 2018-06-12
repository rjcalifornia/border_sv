<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mapas
 *
 * @ORM\Table(name="mapas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MapasRepository")
 */
class Mapas
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
     * @ORM\Column(name="nombremapa", type="string", length=900, nullable=true)
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
     * Set nombremapa
     *
     * @param string $nombremapa
     *
     * @return Mapas
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
     * @return Mapas
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
     * @return Mapas
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
     * @return Mapas
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
     * @return Mapas
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

