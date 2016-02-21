<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 13/11/15
 * Time: 12:56
 */

namespace AppBundle\Utility;


class CabeceraRequest
{

    /*
     *  Cantidad de registros del detalle del
     *  comprobante o lote de comprobantes de
     *  ingreso por defecto 1
     *
     */
    public $CantReg = 1;

    /*
     * Tipo de comprobante que se está
     * informando. Si se informa más de un
     * comprobante, todos deben ser del mismo
     * tipo. Por defecto factura c.
     *
     */

    public $CbteTipo = 11;


    /*
     * Punto de Venta del comprobante que se está
     *   informando. Si se informa más de un
     *   comprobante, todos deben corresponder al
     *   mismo punto de venta.
     *
     */
    public $PtoVta;
}