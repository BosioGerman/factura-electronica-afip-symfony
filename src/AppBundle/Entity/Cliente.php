<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cliente
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
     * @var string
     *
     * @ORM\Column(name="domicilio_postal", type="string", length=255)
     */
    private $domicilioPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="cuit", type="string", length=255)
     */
    private $cuit;

    /**
     * @ORM\ManyToOne(targetEntity="DNITipo")
     * @ORM\JoinColumn(name="id_tipo", referencedColumnName="id")
     * */
    private $idTipo;

    
    /**
     * @ORM\ManyToOne(targetEntity="Regimen")
     * @ORM\JoinColumn(name="regimen", referencedColumnName="id")
     * */
    private $regimen;

    /**
     * @var string
     *
     * @ORM\Column(name="condicion_iva", type="string", length=255)
     */
    private $condicionIva;

    /**
     * @var float
     *
     * @ORM\Column(name="deuda", type="float")
     */
    private $deuda;


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
     * @return Cliente
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
     * Set domicilioPostal
     *
     * @param string $domicilioPostal
     *
     * @return Cliente
     */
    public function setDomicilioPostal($domicilioPostal)
    {
        $this->domicilioPostal = $domicilioPostal;

        return $this;
    }

    /**
     * Get domicilioPostal
     *
     * @return string
     */
    public function getDomicilioPostal()
    {
        return $this->domicilioPostal;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     *
     * @return Cliente
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Get cuit
     *
     * @return string
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set condicionIva
     *
     * @param string $condicionIva
     *
     * @return Cliente
     */
    public function setCondicionIva($condicionIva)
    {
        $this->condicionIva = $condicionIva;

        return $this;
    }

    /**
     * Get condicionIva
     *
     * @return string
     */
    public function getCondicionIva()
    {
        return $this->condicionIva;
    }

    /**
     * Set deuda
     *
     * @param float $deuda
     *
     * @return Cliente
     */
    public function setDeuda($deuda)
    {
        $this->deuda = $deuda;

        return $this;
    }

    /**
     * Get deuda
     *
     * @return float
     */
    public function getDeuda()
    {
        return $this->deuda;
    }

    /**
     * Set regimen
     *
     * @param \AppBundle\Entity\Regimen $regimen
     *
     * @return Cliente
     */
    public function setRegimen(\AppBundle\Entity\Regimen $regimen = null)
    {
        $this->regimen = $regimen;

        return $this;
    }

    /**
     * Get regimen
     *
     * @return \AppBundle\Entity\Regimen
     */
    public function getRegimen()
    {
        return $this->regimen;
    }

    /**
     * Set idTipo
     *
     * @param \AppBundle\Entity\DNITipo $idTipo
     *
     * @return Cliente
     */
    public function setIdTipo(\AppBundle\Entity\DNITipo $idTipo = null)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return \AppBundle\Entity\DNITipo
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }
}
