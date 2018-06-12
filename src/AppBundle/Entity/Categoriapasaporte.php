<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoriapasaporte
 *
 * @ORM\Table(name="categoriapasaporte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriapasaporteRepository")
 */
class Categoriapasaporte
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
     * @ORM\Column(name="categorianombre", type="string", length=500, nullable=true)
     */
    private $categorianombre;

    /**
     * @var string
     *
     * @ORM\Column(name="categoriadescripcion", type="string", length=500, nullable=true)
     */
    private $categoriadescripcion;


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
     * Set categorianombre
     *
     * @param string $categorianombre
     *
     * @return Categoriapasaporte
     */
    public function setCategorianombre($categorianombre)
    {
        $this->categorianombre = $categorianombre;

        return $this;
    }

    /**
     * Get categorianombre
     *
     * @return string
     */
    public function getCategorianombre()
    {
        return $this->categorianombre;
    }

    /**
     * Set categoriadescripcion
     *
     * @param string $categoriadescripcion
     *
     * @return Categoriapasaporte
     */
    public function setCategoriadescripcion($categoriadescripcion)
    {
        $this->categoriadescripcion = $categoriadescripcion;

        return $this;
    }

    /**
     * Get categoriadescripcion
     *
     * @return string
     */
    public function getCategoriadescripcion()
    {
        return $this->categoriadescripcion;
    }
}

