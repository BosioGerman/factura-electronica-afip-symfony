<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 16/11/15
 * Time: 15:49
 */

namespace AppBundle\Utility;

use AppBundle\Entity\PuntoVenta;
use AppBundle\Entity\NumeroComprobante;
use Doctrine\Common\Persistence\ObjectManager;


class ComprobanteNumeroProvider
{
    protected $em;

    public function __construct(ObjectManager $em){
        $this->em = $em;
    }

    public function getNewComprobanteNumero(PuntoVenta $puntoVenta){
        $lastOne = $this->em->getRepository('AppBundle:NumeroComprobante')->findLastNumeroComprobante($puntoVenta->getNumero());
        $comprobante_numero_entity = new NumeroComprobante();

        if(empty($lastOne)){
            $comprobante_numero = 1;
            $comprobante_numero_entity->setNumero($comprobante_numero);
        }else{
            $comprobante_numero =  $lastOne[0]->getNumero();
            $comprobante_numero_entity->setNumero($comprobante_numero + 1);
        }

        $comprobante_numero_entity->setPuntoVenta($puntoVenta);

        return $comprobante_numero_entity;
    }
}