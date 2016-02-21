<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 15/11/15
 * Time: 22:55
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReglaComprobante
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ReglaComprobante
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
     * @ORM\ManyToOne(targetEntity="Regimen")
     * @ORM\JoinColumn(name="emisor_regimen", referencedColumnName="id")
     * */
    private $emisorRegimen;

    /**
     * @ORM\ManyToOne(targetEntity="Regimen")
     * @ORM\JoinColumn(name="cliente_regimen", referencedColumnName="id")
     * */
    private $clienteRegimen;

    /**
     * @ORM\ManyToOne(targetEntity="Comprobante")
     * @ORM\JoinColumn(name="comprobante_tipo", referencedColumnName="id")
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
     * Set emisorRegimen
     *
     * @param \AppBundle\Entity\Regimen $emisorRegimen
     *
     * @return ReglaComprobante
     */
    public function setEmisorRegimen(\AppBundle\Entity\Regimen $emisorRegimen = null)
    {
        $this->emisorRegimen = $emisorRegimen;

        return $this;
    }

    /**
     * Get emisorRegimen
     *
     * @return \AppBundle\Entity\Regimen
     */
    public function getEmisorRegimen()
    {
        return $this->emisorRegimen;
    }

    /**
     * Set clienteRegimen
     *
     * @param \AppBundle\Entity\Regimen $clienteRegimen
     *
     * @return ReglaComprobante
     */
    public function setClienteRegimen(\AppBundle\Entity\Regimen $clienteRegimen = null)
    {
        $this->clienteRegimen = $clienteRegimen;

        return $this;
    }

    /**
     * Get clienteRegimen
     *
     * @return \AppBundle\Entity\Regimen
     */
    public function getClienteRegimen()
    {
        return $this->clienteRegimen;
    }

    /**
     * Set comprobanteTipo
     *
     * @param \AppBundle\Entity\Comprobante $comprobanteTipo
     *
     * @return ReglaComprobante
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
}
