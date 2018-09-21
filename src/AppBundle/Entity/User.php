<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    /**
     * @var string
     *
     * @ORM\Column(name="nombrecompleto", type="string", length=428)
     */
    private $nombrecompleto;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * Set nombrecompleto
     *
     * @param string $nombrecompleto
     *
     * @return User
     */
    public function setNombrecompleto($nombrecompleto)
    {
        $this->nombrecompleto = $nombrecompleto;

        return $this;
    }

    /**
     * Get nombrecompleto
     *
     * @return string
     */
    public function getNombrecompleto()
    {
        return $this->nombrecompleto;
    }

}