<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comprobante
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comprobante
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
     * @var integer
     *
     * @ORM\Column(name="afip_id", type="integer")
     */
    private $afipId;

    /**
     * @var string
     *
     * @ORM\Column(name="afip_nombre", type="string", length=255)
     */
    private $afipNombre;

    /**
     * @ORM\ManyToOne(targetEntity="Regimen", inversedBy="comprobantes")
     *
     * */
    private $regimen;

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
     * @return Comprobante
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
     * Set afipId
     *
     * @param integer $afipId
     *
     * @return Comprobante
     */
    public function setAfipId($afipId)
    {
        $this->afipId = $afipId;

        return $this;
    }

    /**
     * Get afipId
     *
     * @return integer
     */
    public function getAfipId()
    {
        return $this->afipId;
    }

    /**
     * Set afipNombre
     *
     * @param string $afipNombre
     *
     * @return Comprobante
     */
    public function setAfipNombre($afipNombre)
    {
        $this->afipNombre = $afipNombre;

        return $this;
    }

    /**
     * Get afipNombre
     *
     * @return string
     */
    public function getAfipNombre()
    {
        return $this->afipNombre;
    }

    /**
     * Set regimen
     *
     * @param \AppBundle\Entity\Regimen $regimen
     *
     * @return Comprobante
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
}
