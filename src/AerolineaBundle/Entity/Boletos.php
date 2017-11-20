<?php

namespace AerolineaBundle\Entity;

/**
 * Boletos
 */
class Boletos
{
    /**
     * @var integer
     */
    private $idBoleto;

    /**
     * @var string
     */
    private $clase;

    /**
     * @var integer
     */
    private $costo;

    /**
     * @var integer
     */
    private $numeroasiento;

    /**
     * @var integer
     */
    private $idPasajero;

    /**
     * @var integer
     */
    private $idVuelo;


    /**
     * Get idBoleto
     *
     * @return integer
     */
    public function getIdBoleto()
    {
        return $this->idBoleto;
    }

    /**
     * Set clase
     *
     * @param string $clase
     *
     * @return Boletos
     */
    public function setClase($clase)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get clase
     *
     * @return string
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set costo
     *
     * @param integer $costo
     *
     * @return Boletos
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return integer
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set numeroasiento
     *
     * @param integer $numeroasiento
     *
     * @return Boletos
     */
    public function setNumeroasiento($numeroasiento)
    {
        $this->numeroasiento = $numeroasiento;

        return $this;
    }

    /**
     * Get numeroasiento
     *
     * @return integer
     */
    public function getNumeroasiento()
    {
        return $this->numeroasiento;
    }

    /**
     * Set idPasajero
     *
     * @param integer $idPasajero
     *
     * @return Boletos
     */
    public function setIdPasajero($idPasajero)
    {
        $this->idPasajero = $idPasajero;

        return $this;
    }

    /**
     * Get idPasajero
     *
     * @return integer
     */
    public function getIdPasajero()
    {
        return $this->idPasajero;
    }

    /**
     * Set idVuelo
     *
     * @param integer $idVuelo
     *
     * @return Boletos
     */
    public function setIdVuelo($idVuelo)
    {
        $this->idVuelo = $idVuelo;

        return $this;
    }

    /**
     * Get idVuelo
     *
     * @return integer
     */
    public function getIdVuelo()
    {
        return $this->idVuelo;
    }
}
