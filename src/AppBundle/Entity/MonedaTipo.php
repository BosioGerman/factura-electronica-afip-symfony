<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MonedaTipo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MonedaTipo
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
     * @ORM\Column(name="afip_nombre", type="string", length=255)
     */
    private $afipNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="afip_id", type="string", length=255)
     */
    private $afipId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activado", type="boolean")
     */
    private $activado;


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
     * @return MonedaTipo
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
     * Set afipNombre
     *
     * @param string $afipNombre
     *
     * @return MonedaTipo
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
     * Set afipId
     *
     * @param string $afipId
     *
     * @return MonedaTipo
     */
    public function setAfipId($afipId)
    {
        $this->afipId = $afipId;

        return $this;
    }

    /**
     * Get afipId
     *
     * @return string
     */
    public function getAfipId()
    {
        return $this->afipId;
    }

    /**
     * Set activado
     *
     * @param boolean $activado
     *
     * @return MonedaTipo
     */
    public function setActivado($activado)
    {
        $this->activado = $activado;

        return $this;
    }

    /**
     * Get activado
     *
     * @return boolean
     */
    public function getActivado()
    {
        return $this->activado;
    }
}

