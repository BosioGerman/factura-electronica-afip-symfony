<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Emisor
 *
 * @ORM\Table()
 * @ORM\Entity
 *
 */
class Emisor
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
     * @ORM\Column(name="razon_social", type="string", length=255)
     */
    private $razonSocial;

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
     * @var string
     *
     * @ORM\Column(name="domicilio", type="string", length=255)
     */
    private $domicilio;

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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_actividades", type="date")
     */
    private $fechaInicioActividades;


    /**
     * @ORM\Column(name="private_key", type="text")
     *
     * @Assert\NotBlank(message="Please, paste the user key data here.")
     *
     */
    private $privateKey;

    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;

        return $this;
    }

    /**
     * @ORM\Column(name="certificate", type="text")
     *
     * @Assert\NotBlank(message="Please, paste the cert data here.")
     *
     */
    private $certificate;

    public function getCertificate()
    {
        return $this->certificate;
    }

    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;

        return $this;
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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Emisor
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set cuit
     *
     * @param string $cuit
     *
     * @return Emisor
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
     * Set domicilio
     *
     * @param string $domicilio
     *
     * @return Emisor
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set condicionIva
     *
     * @param string $condicionIva
     *
     * @return Emisor
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
     * Set fechaInicioActividades
     *
     * @param \DateTime $fechaInicioActividades
     *
     * @return Emisor
     */
    public function setFechaInicioActividades($fechaInicioActividades)
    {
        $this->fechaInicioActividades = $fechaInicioActividades;

        return $this;
    }

    /**
     * Get fechaInicioActividades
     *
     * @return \DateTime
     */
    public function getFechaInicioActividades()
    {
        return $this->fechaInicioActividades;
    }

    /**
     * Set regimen
     *
     * @param \AppBundle\Entity\Regimen $regimen
     *
     * @return Emisor
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
     * @return Emisor
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
