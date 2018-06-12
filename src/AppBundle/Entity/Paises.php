<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paises
 *
 * @ORM\Table(name="paises")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaisesRepository")
 */
class Paises
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
     * @ORM\Column(name="paisnombre", type="string", length=800, nullable=true)
     */
    private $paisnombre;


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
     * Set paisnombre
     *
     * @param string $paisnombre
     *
     * @return Paises
     */
    public function setPaisnombre($paisnombre)
    {
        $this->paisnombre = $paisnombre;

        return $this;
    }

    /**
     * Get paisnombre
     *
     * @return string
     */
    public function getPaisnombre()
    {
        return $this->paisnombre;
    }
}

