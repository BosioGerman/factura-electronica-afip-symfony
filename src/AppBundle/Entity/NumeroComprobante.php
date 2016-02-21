<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NumeroComprobante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NumeroComprobanteRepository")
 */
class NumeroComprobante
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
     * @ORM\Column(name="numero", type="string", length=255)
     */
    private $numero;


    /**
     * @ORM\ManyToOne(targetEntity="PuntoVenta")
     * @ORM\JoinColumn(name="punto_venta", referencedColumnName="id")
     * */
    private $puntoVenta;

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
     * Set numero
     *
     * @param string $numero
     *
     * @return NumeroComprobante
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set puntoVenta
     *
     * @param \AppBundle\Entity\PuntoVenta $puntoVenta
     *
     * @return NumeroComprobante
     */
    public function setPuntoVenta(\AppBundle\Entity\PuntoVenta $puntoVenta = null)
    {
        $this->puntoVenta = $puntoVenta;

        return $this;
    }

    /**
     * Get puntoVenta
     *
     * @return \AppBundle\Entity\PuntoVenta
     */
    public function getPuntoVenta()
    {
        return $this->puntoVenta;
    }
}
