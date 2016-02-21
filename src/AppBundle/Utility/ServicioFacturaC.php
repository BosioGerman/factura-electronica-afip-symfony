<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/11/15
 * Time: 14:32
 */

namespace AppBundle\Utility;

use AppBundle\Entity\Factura;
use AppBundle\Utility\CabeceraRequest;
use AppBundle\Utility\DetRequest;

class ServicioFacturaC
{
    public static function setOperationValuesData(Factura $entity){
        $data =


        /*
         * informacion de cabeccera del cobrobante o lote de comprobantes ingresante
         * */
        $FeCabReq = new CabeceraRequest();
        /*
         *  Cantidad de registros del detalle del
         *  comprobante o lote de comprobantes de
         *  ingreso por defecto 1
         *
         */
        $FeCabReq->CantReg = 1;

        /*
         * Tipo de comprobante que se está
         * informando. Si se informa más de un
         * comprobante, todos deben ser del mismo
         * tipo. Por defecto factura c.
         *
         */

        $FeCabReq->CbteTipo = $entity->getComprobanteTipo()->getAfipId();


        /*
         * Punto de Venta del comprobante que se está
         *   informando. Si se informa más de un
         *   comprobante, todos deben corresponder al
         *   mismo punto de venta.
         *
         */
        $FeCabReq->PtoVta = $entity->getPuntoVenta()->getNumero();




        $FECAEDetRequest = new DetRequest();
        /*
         * Concepto del Factura. Valores
            permitidos:
            1 Productos
            2 Servicios (Por defecto)
            3 Productos y Servicios

         */
        $FECAEDetRequest->Concepto = $entity->getConceptoTipo()->getAfipId();
        /*
         * Código de documento identificatorio del
            comprador DNI por defecto
         */

        $FECAEDetRequest->DocTipo =  $entity->getCliente()->getIdTipo()->getAfipId();

        /*
         * Nro. De identificación del comprador
         */

        $FECAEDetRequest->DocNro = $entity->getCliente()->getCuit();

        /*
         * Nro. De comprobante desde
        Rango 1- 99999999

         */

        $FECAEDetRequest->CbteDesde = $entity->getNumeroComprobante()->getNumero();
        /*Nro. De comprobante registrado hasta
            Rango 1- 99999999
        */

        $FECAEDetRequest->CbteHasta = $entity->getNumeroComprobante()->getNumero();

        /*
         * Fecha del comprobante (yyyymmdd). Para
        concepto igual a 1, la fecha de emisión del
        comprobante puede ser hasta 5 días
        anteriores o posteriores respecto de la
        fecha de generación; si se indica
        Concepto igual a 2 ó 3 puede ser hasta 10
        días anteriores o posteriores a la fecha de
        generación. Si no se envía la fecha del
        comprobante se asignará la fecha de proceso

         */

        $FECAEDetRequest->CbteFch = intval($entity->getFechaEmision()->format("Ymd"));
        /*
         * Importe total del comprobante, Debe ser
igual a Importe neto no gravado + Importe
exento + Importe neto gravado + todos los
campos de IVA al XX% + Importe de
tributos.

         */
        $FECAEDetRequest->ImpTotal = $entity->getTotal();
        /*
         * Importe neto no gravado.
        Debe ser menor o igual a Importe total y
        no puede ser menor a cero.
        No puede ser mayor al Importe total de la
        operación ni menor a cero (0).
        Para comprobantes tipo C debe ser igual a
        cero (0).
        Para comprobantes tipo Bienes Usados –
        Emisor Monotributista este campo
        corresponde al importe subtotal.

         */

        $FECAEDetRequest->ImpTotConc = 0;
        /*
         * Importe neto gravado. Debe ser menor o
        igual a Importe total y no puede ser menor
        a cero. Para comprobantes tipo C este
        campo corresponde al Importe del Sub
        Total.
        Para comprobantes tipo Bienes Usados –
        Emisor Monotributista no debe informarse
        o debe ser igual a cero (0).

         */
        $FECAEDetRequest->ImpNeto = $entity->getSubtotal();
        /*
         * Importe exento. Debe ser menor o igual a
Importe total y no puede ser menor a cero.
Para comprobantes tipo C debe ser igual a
cero (0).
Para comprobantes tipo Bienes Usados –
Emisor Monotributista no debe informarse
o debe ser igual a cero (0).

         */

        $FECAEDetRequest->ImpOpEx = 0;
        /*
         * Suma de los importes del array de IVA.
        Para comprobantes tipo C debe ser igual a
        cero (0).
        Para comprobantes tipo Bienes Usados –
        Emisor Monotributista no debe informarse
        o debe ser igual a cero (0).

         */
        $FECAEDetRequest->ImpIVA = $entity->getIva();
        /*
         * Suma de los importes del array de tributos

         */

        $FECAEDetRequest->ImpTrib = 0;
        /*
         * Fecha de inicio del abono para el servicio
        a facturar. Dato obligatorio para concepto
        2 o 3 (Servicios / Productos y Servicios).
        Formato yyyymmdd

         */
        $FECAEDetRequest->FchServDesde =  intval($entity->getFechaServicioInicio()->format("Ymd"));
        /*
         * Fecha de fin del abono para el servicio a
        facturar. Dato obligatorio para concepto
        2 o 3 (Servicios / Productos y Servicios).
        Formato yyyymmdd. FchServHasta no
        puede ser menor a FchServDesde

         */
        $FECAEDetRequest->FchServHasta = intval( $entity->getFechaServicioFin()->format("Ymd"));

        /*
         * Fecha de vencimiento del pago servicio a
        facturar. Dato obligatorio para concepto
        2 o 3 (Servicios / Productos y Servicios).
        Formato yyyymmdd. Debe ser igual o
        posterior a la fecha del comprobante.

         */
        $FECAEDetRequest->FchVtoPago = intval( $entity->getFechaVencimiento()->format("Ymd"));

        if( $entity->getConceptoTipo()->getAfipId() === 1 ) {
            unset($FECAEDetRequest->FchServDesde);
            unset($FECAEDetRequest->FchServHasta);
            unset($FECAEDetRequest->FchVtoPago);
        }
            /*
             * Código de moneda del comprobante.
            Consultar método
            FEParamGetTiposMonedas para valores
            posibles PESOS por defecto

             */
        $FECAEDetRequest->MonId = "PES";
        /*
         * Cotización de la moneda informada. Para
        PES, pesos argentinos la misma debe
        ser 1

         */

        $FECAEDetRequest->MonCotiz = 1;
        /*
         * Array para informar los comprobantes
        asociados <CbteAsoc>

         */

        // $FECAEDetRequest->CbtesAsoc = 1;
        /*
         * Array para informar los tributos asociados
        a un comprobante <Tributo>.

         */

        //$FECAEDetRequest->Tributos = 1;
        /*
         * Array para informar las alícuotas y sus
        importes asociados a un comprobante
        <AlicIva>.
        Para comprobantes tipo C y Bienes
        Usados – Emisor Monotributista no debe
        informar el array.

         */
        /*<Iva>
<AlicIva>
<Id>short</Id>
<BaseImp>double</BaseImp>
<Importe>double</Importe>
</AlicIva>
</Iva>*/
        // $FECAEDetRequest->IVA = 1;

        /*
         * Array de campos auxiliares. Reservado
        usos futuros <Opcional>. Adicionales por
        R.G.

         */
        //     $FECAEDetRequest->Opcionales = 1;


        if($entity->getComprobanteTipo()->getAfipId() === 1){

         $AlicIva = new \stdClass();
         $AlicIva->Id = 5;
         $AlicIva->BaseImp = $entity->getSubtotal();
         $AlicIva->Importe = $entity->getIva();

        $Iva = new \stdClass();
        $Iva->AlicIva = $AlicIva;

        $FECAEDetRequest->Iva = $Iva;

        }

        $FeCAEReq = new \stdClass();
        $FeCAEReq->FeCabReq = $FeCabReq;
        $FeCAEReq->FeDetReq = new \stdClass();
        $FeCAEReq->FeDetReq->FECAEDetRequest =$FECAEDetRequest;


        return $FeCAEReq;

    }

}