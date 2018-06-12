<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoriapaises
 *
 * @ORM\Table(name="categoriapaises")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriapaisesRepository")
 */
class Categoriapaises
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
     * @ORM\Column(name="categorianombre", type="string", length=255, nullable=true)
     */
    private $categorianombre;

    /**
     * @var string
     *
     * @ORM\Column(name="categoriadescripcion", type="string", length=600, nullable=true)
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
     * @return Categoriapaises
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
     * @return Categoriapaises
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

