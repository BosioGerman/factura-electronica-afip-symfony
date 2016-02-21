<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categoria
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
     * @ORM\ManyToOne(targetEntity="IvaTipo")
     * @ORM\JoinColumn(name="iva_tipo", referencedColumnName="id")
     * */
    private $ivaTipo;

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
     * @return Categoria
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
     * Set ivaTipo
     *
     * @param \AppBundle\Entity\IvaTipo $ivaTipo
     *
     * @return Categoria
     */
    public function setIvaTipo(\AppBundle\Entity\IvaTipo $ivaTipo = null)
    {
        $this->ivaTipo = $ivaTipo;

        return $this;
    }

    /**
     * Get ivaTipo
     *
     * @return \AppBundle\Entity\IvaTipo
     */
    public function getIvaTipo()
    {
        return $this->ivaTipo;
    }
}
