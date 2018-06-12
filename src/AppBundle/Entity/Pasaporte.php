<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pasaporte
 *
 * @ORM\Table(name="pasaporte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PasaporteRepository")
 */
class Pasaporte
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
     * @var int
     *
     * @ORM\Column(name="edisonid", type="integer", nullable=true)
     */
    private $edisonid;

    /**
     * @var int
     *
     * @ORM\Column(name="categoriapasaporteid", type="integer", nullable=true)
     */
    private $categoriapasaporteid;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrepasaporte", type="string", length=500, nullable=true)
     */
    private $nombrepasaporte;

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
     * @return Pasaporte
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
     * Set edisonid
     *
     * @param integer $edisonid
     *
     * @return Pasaporte
     */
    public function setEdisonid($edisonid)
    {
        $this->edisonid = $edisonid;

        return $this;
    }

    /**
     * Get edisonid
     *
     * @return int
     */
    public function getEdisonid()
    {
        return $this->edisonid;
    }

    /**
     * Set categoriapasaporteid
     *
     * @param integer $categoriapasaporteid
     *
     * @return Pasaporte
     */
    public function setCategoriapasaporteid($categoriapasaporteid)
    {
        $this->categoriapasaporteid = $categoriapasaporteid;

        return $this;
    }

    /**
     * Get categoriapasaporteid
     *
     * @return int
     */
    public function getCategoriapasaporteid()
    {
        return $this->categoriapasaporteid;
    }

    /**
     * Set nombrepasaporte
     *
     * @param string $nombrepasaporte
     *
     * @return Pasaporte
     */
    public function setNombrepasaporte($nombrepasaporte)
    {
        $this->nombrepasaporte = $nombrepasaporte;

        return $this;
    }

    /**
     * Get nombrepasaporte
     *
     * @return string
     */
    public function getNombrepasaporte()
    {
        return $this->nombrepasaporte;
    }

    /**
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Pasaporte
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
     * @return Pasaporte
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

