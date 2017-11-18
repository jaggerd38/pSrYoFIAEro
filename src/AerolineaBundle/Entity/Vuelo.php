<?php

namespace AerolineaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vuelo
 */
class Vuelo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $aerolinea;

    /**
     * @var string
     */
    private $destino;






    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pasajero;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pasajero = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }













    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set aerolinea
     *
     * @param string $aerolinea
     *
     * @return Vuelo
     */
    public function setAerolinea($aerolinea)
    {
        $this->aerolinea = $aerolinea;

        return $this;
    }

    /**
     * Get aerolinea
     *
     * @return string
     */
    public function getAerolinea()
    {
        return $this->aerolinea;
    }

    /**
     * Set destino
     *
     * @param string $destino
     *
     * @return Vuelo
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string
     */
    public function getDestino()
    {
        return $this->destino;
    }






















    /**
     * Add pasajero
     *
     * @param \AerolineaBundle\Entity\Pasajero $pasajero
     * @return Vuelo
     */
    public function addPasajero(\AerolineaBundle\Entity\Pasajero $pasajero)
    {
        $this->pasajero[] = $pasajero;
        return $this;
    }

    /**
     * Remove pasajero
     *
     * @param \AerolineaBundle\Entity\Pasajero $pasajero
     */
    public function removePasajero(\AerolineaBundle\Entity\Pasajero $pasajero)
    {
        $this->pasajero->removeElement($pasajero);
    }

    /**
     * Get pasajero
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPasajero()
    {
        return $this->pasajero;
    }
}
