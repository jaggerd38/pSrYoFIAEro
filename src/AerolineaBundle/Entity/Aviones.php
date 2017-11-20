<?php

namespace AerolineaBundle\Entity;

/**
 * Aviones
 */
class Aviones
{
    /**
     * @var integer
     */
    private $idAvion;

    /**
     * @var string
     */
    private $nombreavion;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var integer
     */
    private $capacidad;


    /**
     * Get idAvion
     *
     * @return integer
     */
    public function getIdAvion()
    {
        return $this->idAvion;
    }

    /**
     * Set nombreavion
     *
     * @param string $nombreavion
     *
     * @return Aviones
     */
    public function setNombreavion($nombreavion)
    {
        $this->nombreavion = $nombreavion;

        return $this;
    }

    /**
     * Get nombreavion
     *
     * @return string
     */
    public function getNombreavion()
    {
        return $this->nombreavion;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Aviones
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set capacidad
     *
     * @param integer $capacidad
     *
     * @return Aviones
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return integer
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }
}
