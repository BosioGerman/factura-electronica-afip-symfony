<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regimen
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Regimen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     * @ORM\OneToMany(targetEntity="Comprobante", mappedBy="regimen", cascade={"persist", "remove"} , orphanRemoval=true)
     *
     */
    private $comprobantes;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Regimen
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
     * Constructor
     */
    public function __construct()
    {
        $this->comprobantes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comprobante
     *
     * @param \AppBundle\Entity\Comprobante $comprobante
     *
     * @return Regimen
     */
    public function addComprobante(\AppBundle\Entity\Comprobante $comprobante)
    {
        $this->comprobantes[] = $comprobante;
        $comprobante->setRegimen($this);

        return $this;
    }

    /**
     * Remove comprobante
     *
     * @param \AppBundle\Entity\Comprobante $comprobante
     */
    public function removeComprobante(\AppBundle\Entity\Comprobante $comprobante)
    {
        $this->comprobantes->removeElement($comprobante);
        $comprobante->setRegimen(null);
    }

    /**
     * Get comprobantes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComprobantes()
    {
        return $this->comprobantes;
    }
}
