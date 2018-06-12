<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consulados
 *
 * @ORM\Table(name="consulados")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConsuladosRepository")
 */
class Consulados
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
     * @ORM\Column(name="redconsularid", type="integer", nullable=true)
     */
    private $redconsularid;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Categoriaconsular")
     * @ORM\JoinColumn(name="categoriaredconsular", referencedColumnName="id")
     */
    private $categoriaredconsular;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=900, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="jurisdiccion", type="string", length=2200, nullable=true)
     */
    private $jurisdiccion;

    /**
     * @var string
     *
     * @ORM\Column(name="personal", type="string", length=2200, nullable=true)
     */
    private $personal;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=2200, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=300, nullable=true)
     */
    private $telefono;

   

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=700, nullable=true)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="informacionconsulado", type="string", length=2200, nullable=true)
     */
    private $informacionconsulado;

    /**
     * @var string
     *
     * @ORM\Column(name="informacionadicional", type="string", length=2200, nullable=true)
     */
    private $informacionadicional;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=300, nullable=true)
     */
    private $correo;

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
     * Set redconsularid
     *
     * @param integer $redconsularid
     *
     * @return Consulados
     */
    public function setRedconsularid($redconsularid)
    {
        $this->redconsularid = $redconsularid;

        return $this;
    }

    /**
     * Get redconsularid
     *
     * @return int
     */
    public function getRedconsularid()
    {
        return $this->redconsularid;
    }

    /**
     * Set categoriaredconsular
     *
     * @param \AppBundle\Entity\Categoriaconsular $categoriaredconsular
     *
     * @return Consulados
     */
    public function setCategoriaredconsular(\AppBundle\Entity\Categoriaconsular $categoriaredconsular = null)
    {
        $this->categoriaredconsular = $categoriaredconsular;

        return $this;
    }

    /**
     * Get categoriaredconsular
     *
     * @return \AppBundle\Entity\Categoriaconsular
     */
    public function getCategoriaredconsular()
    {
        return $this->categoriaredconsular;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Consulados
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set jurisdiccion
     *
     * @param string $jurisdiccion
     *
     * @return Consulados
     */
    public function setJurisdiccion($jurisdiccion)
    {
        $this->jurisdiccion = $jurisdiccion;

        return $this;
    }

    /**
     * Get jurisdiccion
     *
     * @return string
     */
    public function getJurisdiccion()
    {
        return $this->jurisdiccion;
    }

    /**
     * Set personal
     *
     * @param string $personal
     *
     * @return Consulados
     */
    public function setPersonal($personal)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return string
     */
    public function getPersonal()
    {
        return $this->personal;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Consulados
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Consulados
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set nombremapa
     *
     * @param string $nombremapa
     *
     * @return Consulados
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
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return Consulados
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set informacionconsulado
     *
     * @param string $informacionconsulado
     *
     * @return Consulados
     */
    public function setInformacionconsulado($informacionconsulado)
    {
        $this->informacionconsulado = $informacionconsulado;

        return $this;
    }

    /**
     * Get informacionconsulado
     *
     * @return string
     */
    public function getInformacionconsulado()
    {
        return $this->informacionconsulado;
    }

    /**
     * Set informacionadicional
     *
     * @param string $informacionadicional
     *
     * @return Consulados
     */
    public function setInformacionadicional($informacionadicional)
    {
        $this->informacionadicional = $informacionadicional;

        return $this;
    }

    /**
     * Get informacionadicional
     *
     * @return string
     */
    public function getInformacionadicional()
    {
        return $this->informacionadicional;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Consulados
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Consulados
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
     * @return Consulados
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
     * @return Consulados
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
     * @return Consulados
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
     * @return Consulados
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
