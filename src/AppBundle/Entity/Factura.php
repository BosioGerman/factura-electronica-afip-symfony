<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factura
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Factura
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_servicio_inicio", type="datetime")
     */
    private $fechaServicioInicio;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_servicio_fin", type="datetime")
     */
    private $fechaServicioFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_emision", type="datetime")
     */
    private $fechaEmision;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date")
     */
    private $fechaVencimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="codigo_autorizacion_electronico", type="bigint")
     */
    private $codigoAutorizacionElectronico;

    /**
     * @ORM\ManyToOne(targetEntity="PuntoVenta")
     * @ORM\JoinColumn(name="puntoo_venta", referencedColumnName="id")
     * */
    private $puntoVenta;

    /**
     * @ORM\ManyToOne(targetEntity="NumeroComprobante")
     * @ORM\JoinColumn(name="numeroo_comprobante", referencedColumnName="id")
     * */
    private $numeroComprobante;


    /**
     * @var float
     *
     * @ORM\Column(name="iva", type="float")
     */
    private $iva;

    /**
     * @var float
     *
     * @ORM\Column(name="subtotal", type="float")
     */
    private $subtotal;
    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     * */
    private $cliente;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     * @ORM\OneToMany(targetEntity="Item", mappedBy="factura", cascade={"persist", "remove"} , orphanRemoval=true)
     *
     */
    private $items;

    /**
     * @ORM\ManyToOne(targetEntity="Concepto")
     * @ORM\JoinColumn(name="concepto", referencedColumnName="id")
     * */
    private $conceptoTipo;

    /**
     * @ORM\ManyToOne(targetEntity="Comprobante")
     * @ORM\JoinColumn(name="comprobante", referencedColumnName="id")
     * */
    private $comprobanteTipo;

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
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     *
     * @return Factura
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;

        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     *
     * @return Factura
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set codigoAutorizacionElectronico
     *
     * @param integer $codigoAutorizacionElectronico
     *
     * @return Factura
     */
    public function setCodigoAutorizacionElectronico($codigoAutorizacionElectronico)
    {
        $this->codigoAutorizacionElectronico = $codigoAutorizacionElectronico;

        return $this;
    }

    /**
     * Get codigoAutorizacionElectronico
     *
     * @return integer
     */
    public function getCodigoAutorizacionElectronico()
    {
        return $this->codigoAutorizacionElectronico;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Factura
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }





    /**
     * Add item
     *
     * @param \AppBundle\Entity\Item $item
     *
     * @return Factura
     */
    public function addItem(\AppBundle\Entity\Item $item)
    {
        $this->items[] = $item;
        $item->setFactura($this);

        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\Item $item
     */
    public function removeItem(\AppBundle\Entity\Item $item)
    {
        $this->items->removeElement($item);
        $item->setFactura(null);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Cliente $cliente
     *
     * @return Factura
     */
    public function setCliente(\AppBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set fechaServicioInicio
     *
     * @param \DateTime $fechaServicioInicio
     *
     * @return Factura
     */
    public function setFechaServicioInicio($fechaServicioInicio)
    {
        $this->fechaServicioInicio = $fechaServicioInicio;

        return $this;
    }

    /**
     * Get fechaServicioInicio
     *
     * @return \DateTime
     */
    public function getFechaServicioInicio()
    {
        return $this->fechaServicioInicio;
    }

    /**
     * Set fechaServicioFin
     *
     * @param \DateTime $fechaServicioFin
     *
     * @return Factura
     */
    public function setFechaServicioFin($fechaServicioFin)
    {
        $this->fechaServicioFin = $fechaServicioFin;

        return $this;
    }

    /**
     * Get fechaServicioFin
     *
     * @return \DateTime
     */
    public function getFechaServicioFin()
    {
        return $this->fechaServicioFin;
    }

    /**
     * Set conceptoTipo
     *
     * @param \AppBundle\Entity\Concepto $conceptoTipo
     *
     * @return Factura
     */
    public function setConceptoTipo(\AppBundle\Entity\Concepto $conceptoTipo = null)
    {
        $this->conceptoTipo = $conceptoTipo;

        return $this;
    }

    /**
     * Get conceptoTipo
     *
     * @return \AppBundle\Entity\Concepto
     */
    public function getConceptoTipo()
    {
        return $this->conceptoTipo;
    }

    /**
     * Set comprobanteTipo
     *
     * @param \AppBundle\Entity\Comprobante $comprobanteTipo
     *
     * @return Factura
     */
    public function setComprobanteTipo(\AppBundle\Entity\Comprobante $comprobanteTipo = null)
    {
        $this->comprobanteTipo = $comprobanteTipo;

        return $this;
    }

    /**
     * Get comprobanteTipo
     *
     * @return \AppBundle\Entity\Comprobante
     */
    public function getComprobanteTipo()
    {
        return $this->comprobanteTipo;
    }

    /**
     * Set puntoVenta
     *
     * @param \AppBundle\Entity\PuntoVenta $puntoVenta
     *
     * @return Factura
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

    /**
     * Set numeroComprobante
     *
     * @param \AppBundle\Entity\NumeroComprobante $numeroComprobante
     *
     * @return Factura
     */
    public function setNumeroComprobante(\AppBundle\Entity\NumeroComprobante $numeroComprobante = null)
    {
        $this->numeroComprobante = $numeroComprobante;

        return $this;
    }

    /**
     * Get numeroComprobante
     *
     * @return \AppBundle\Entity\NumeroComprobante
     */
    public function getNumeroComprobante()
    {
        return $this->numeroComprobante;
    }

    /**
     * Set iva
     *
     * @param float $iva
     *
     * @return Factura
     */
    public function setIva($iva)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return float
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set subtotal
     *
     * @param float $subtotal
     *
     * @return Factura
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }
}
