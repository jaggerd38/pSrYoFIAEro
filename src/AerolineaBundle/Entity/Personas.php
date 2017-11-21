<?php

namespace AerolineaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Personas
 */
class Personas implements UserInterface
{
    /**
     * @var integer
     */
    private $idPersona;

    /**
     * @var string
     */
    private $usuarioPersona;

    /**
     * @var string
     */
    private $passPersona;






    //AUTH
    public function getUsername()
    {
      dump($this->usuarioPersona);
      die();
        return $this->usuarioPersona;
    }

    public function getSalt()
    {
       return null;
    }

    public function getRoles()
    {
        return array($this->getRole());
    }

    public function eraseCredentials(){

    }
    //END AUTH


    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
      dump($this->passPersona);
      die();
        return $this->passPersona;
    }










    /**
     * Get idPersona
     *
     * @return integer
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set usuarioPersona
     *
     * @param string $usuarioPersona
     *
     * @return Personas
     */
    public function setUsuarioPersona($usuarioPersona)
    {
        $this->usuarioPersona = $usuarioPersona;

        return $this;
    }

    /**
     * Get usuarioPersona
     *
     * @return string
     */
    public function getUsuarioPersona()
    {
        return $this->usuarioPersona;
    }

    /**
     * Set passPersona
     *
     * @param string $passPersona
     *
     * @return Personas
     */
    public function setPassPersona($passPersona)
    {
        $this->passPersona = $passPersona;

        return $this;
    }

    /**
     * Get passPersona
     *
     * @return string
     */
    public function getPassPersona()
    {
        return $this->passPersona;
    }
}
