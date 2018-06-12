<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infopais
 *
 * @ORM\Table(name="infopais")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InfopaisRepository")
 */
class Infopais
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
     * @var \AppBundle\Entity\Categoriapaises
     * 
     * @ORM\ManyToOne(targetEntity="Categoriapaises")
     * @ORM\JoinColumn(name="categoriaordinarioid", referencedColumnName="id")
     */
    private $categoriaordinarioid;

    /**
     * @var \AppBundle\Entity\Categoriapaises
     * 
     * @ORM\ManyToOne(targetEntity="Categoriapaises")
     * @ORM\JoinColumn(name="categoriadiplomaticoid", referencedColumnName="id")
     */
    private $categoriadiplomaticoid;

    /**
     * @var string
     *
     * @ORM\Column(name="capital", type="string", length=700, nullable=true)
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma", type="string", length=750, nullable=true)
     */
    private $idioma;

    /**
     * @var string
     *
     * @ORM\Column(name="formagobierno", type="string", length=900, nullable=true)
     */
    private $formagobierno;

    /**
     * @var string
     *
     * @ORM\Column(name="legislacion", type="string", length=900, nullable=true)
     */
    private $legislacion;

    /**
     * @var string
     *
     * @ORM\Column(name="moneda", type="string", length=700, nullable=true)
     */
    private $moneda;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=700, nullable=true)
     */
    private $poblacion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="superficie", type="string", length=700, nullable=true)
     */
    private $superficie;

    
    /**
     * @var string
     *
     * @ORM\Column(name="gentilicio", type="string", length=700, nullable=true)
     */
    private $gentilicio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigoiso", type="string", length=255, nullable=true)
     */
    private $codigoiso;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=5200, nullable=true)
     */
    private $observaciones;

    /**
     * @var int
     *
     * @ORM\Column(name="mapaid", type="integer", nullable=true)
     */
    private $mapaid;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Banderas")
     * @ORM\JoinColumn(name="banderaid", referencedColumnName="id")
     */
    private $banderaid;
    
         
    
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
     * @var string
     *
     * @ORM\Column(name="usermodi", type="string", length=500, nullable=true)
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
     * @return Infopais
     */
    public function setPaisid(\AppBundle\Entity\Paises $paisid = null)
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
     * Set categoriaordinarioid
     *
     * @param \AppBundle\Entity\Categoriapaises $categoriaordinarioid
     *
     * @return Infopais
     */
    public function setCategoriaordinarioid(\AppBundle\Entity\Categoriapaises $categoriaordinarioid = null)
    {
        $this->categoriaordinarioid = $categoriaordinarioid;

        return $this;
    }

    /**
     * Get categoriaordinarioid
     *
     * @return \AppBundle\Entity\Categoriapaises
     */
    public function getCategoriaordinarioid()
    {
        return $this->categoriaordinarioid;
    }

    /**
     * Set categoriadiplomaticoid
     *
     * @param \AppBundle\Entity\Categoriapaises $categoriadiplomaticoid
     *
     * @return Infopais
     */
    public function setCategoriadiplomaticoid(\AppBundle\Entity\Categoriapaises $categoriadiplomaticoid = null)
    {
        $this->categoriadiplomaticoid = $categoriadiplomaticoid;

        return $this;
    }

    /**
     * Get categoriadiplomaticoid
     *
     * @return \AppBundle\Entity\Categoriapaises
     */
    public function getCategoriadiplomaticoid()
    {
        return $this->categoriadiplomaticoid;
    }

    /**
     * Set capital
     *
     * @param string $capital
     *
     * @return Infopais
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     *
     * @return Infopais
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return string
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set formagobierno
     *
     * @param string $formagobierno
     *
     * @return Infopais
     */
    public function setFormagobierno($formagobierno)
    {
        $this->formagobierno = $formagobierno;

        return $this;
    }

    /**
     * Get formagobierno
     *
     * @return string
     */
    public function getFormagobierno()
    {
        return $this->formagobierno;
    }

    /**
     * Set legislacion
     *
     * @param string $legislacion
     *
     * @return Infopais
     */
    public function setLegislacion($legislacion)
    {
        $this->legislacion = $legislacion;

        return $this;
    }

    /**
     * Get legislacion
     *
     * @return string
     */
    public function getLegislacion()
    {
        return $this->legislacion;
    }

    /**
     * Set moneda
     *
     * @param string $moneda
     *
     * @return Infopais
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get moneda
     *
     * @return string
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set poblacion
     *
     * @param string $poblacion
     *
     * @return Infopais
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return string
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set codigoiso
     *
     * @param string $codigoiso
     *
     * @return Infopais
     */
    public function setCodigoiso($codigoiso)
    {
        $this->codigoiso = $codigoiso;

        return $this;
    }

    /**
     * Get codigoiso
     *
     * @return string
     */
    public function getCodigoiso()
    {
        return $this->codigoiso;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Infopais
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set mapaid
     *
     * @param integer $mapaid
     *
     * @return Infopais
     */
    public function setMapaid($mapaid)
    {
        $this->mapaid = $mapaid;

        return $this;
    }

    /**
     * Get mapaid
     *
     * @return int
     */
    public function getMapaid()
    {
        return $this->mapaid;
    }

    /**
     * Set useradic
     *
     * @param string $useradic
     *
     * @return Infopais
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
     * @return Infopais
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
     * @return Infopais
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
     * @return Infopais
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
     * Set superficie
     *
     * @param string $superficie
     *
     * @return Infopais
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return string
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }
    
    
    
    /**
     * Set gentilicio
     *
     * @param string $gentilicio
     *
     * @return Infopais
     */
    public function setGentilicio($gentilicio)
    {
        $this->gentilicio = $gentilicio;

        return $this;
    }

    /**
     * Get gentilicio
     *
     * @return string
     */
    public function getGentilicio()
    {
        return $this->gentilicio;
    }
    
    
    /**
     * Set banderaid
     *
     * @param \AppBundle\Entity\Banderas $banderaid
     *
     * @return Infopais
     */
    public function setBanderaid(\AppBundle\Entity\Banderas $banderaid = null)
    {
        $this->banderaid = $banderaid;

        return $this;
    }

    /**
     * Get banderaid
     *
     * @return \AppBundle\Entity\Banderas
     */
    public function getBanderaid()
    {
        return $this->banderaid;
    }

}

