<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banderas
 *
 * @ORM\Table(name="banderas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BanderasRepository")
 */
class Banderas
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
     * @ORM\Column(name="paisid", type="integer", nullable=true)
     */
    private $paisid;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrebandera", type="string", length=500, nullable=true)
     */
    private $nombrebandera;

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
     * Set paisid
     *
     * @param integer $paisid
     *
     * @return Banderas
     */
    public function setPaisid($paisid)
    {
        $this->paisid = $paisid;

        return $this;
    }

    /**
     * Get paisid
     *
     * @return int
     */
    public function getPaisid()
    {
        return $this->paisid;
    }

    /**
     * Set nombrebandera
     *
     * @param string $nombrebandera
     *
     * @return Banderas
     */
    public function setNombrebandera($nombrebandera)
    {
        $this->nombrebandera = $nombrebandera;

        return $this;
    }

    /**
     * Get nombrebandera
     *
     * @return string
     */
    public function getNombrebandera()
    {
        return $this->nombrebandera;
    }

    /**
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Banderas
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
     * @return Banderas
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

