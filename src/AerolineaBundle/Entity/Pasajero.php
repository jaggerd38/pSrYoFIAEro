<?php

namespace AerolineaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pasajero
 */
class Pasajero
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $genero;






    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $vuelo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vuelo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();;
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
     * Set name
     *
     * @param string $name
     *
     * @return Pasajero
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Pasajero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

























    /**
     * Add vuelo
     *
     * @param \AerolineaBundle\Entity\Vuelo $vuelo
     * @return Pasajero
     */
    public function addVuelo(\ManyToManyBundle\Entity\Vuelo $vuelo)
    {
        $vuelo->addPasajero($this);
        $this->vuelo[] = $vuelo;

        return $this;
    }

    /**
     * Remove vuelo
     *
     * @param \AerolineaBundle\Entity\Vuelo $vuelo
     */
    public function removeVuelo(\Mesd\ManyToManyBundle\Entity\Vuelo $vuelo)
    {
        $vuelo->removePasajero($this);
        $this->vuelo->removeElement($vuelo);
    }

    /**
     * Get vuelo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVuelo()
    {
        return $this->vuelo;
    }
}
