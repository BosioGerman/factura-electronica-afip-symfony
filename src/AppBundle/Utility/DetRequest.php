<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 13/11/15
 * Time: 13:13
 */

namespace AppBundle\Utility;


class DetRequest
{
    /*
     * Concepto del Factura. Valores
        permitidos:
        1 Productos
        2 Servicios (Por defecto)
        3 Productos y Servicios

     */
public $Concepto = 2;
    /*
     * Código de documento identificatorio del
        comprador DNI por defecto
     */

public $DocTipo = 96;

    /*
     * Nro. De identificación del comprador
     */

public $DocNro ;

    /*
     * Nro. De comprobante desde
    Rango 1- 99999999

     */

public $CbteDesde ;
    /*Nro. De comprobante registrado hasta
        Rango 1- 99999999
    */

public $CbteHasta ;

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

public $CbteFch  ;
    /*
     * Importe total del comprobante, Debe ser
igual a Importe neto no gravado + Importe
exento + Importe neto gravado + todos los
campos de IVA al XX% + Importe de
tributos.

     */
public $ImpTotal;
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

public $ImpTotConc ;
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
public $ImpNeto ;
    /*
     * Importe exento. Debe ser menor o igual a
Importe total y no puede ser menor a cero.
Para comprobantes tipo C debe ser igual a
cero (0).
Para comprobantes tipo Bienes Usados –
Emisor Monotributista no debe informarse
o debe ser igual a cero (0).

     */

public $ImpOpEx ;
    /*
     * Suma de los importes del array de IVA.
    Para comprobantes tipo C debe ser igual a
    cero (0).
    Para comprobantes tipo Bienes Usados –
    Emisor Monotributista no debe informarse
    o debe ser igual a cero (0).

     */
public $ImpIVA ;
    /*
     * Suma de los importes del array de tributos

     */

public $ImpTrib ;
    /*
     * Fecha de inicio del abono para el servicio
    a facturar. Dato obligatorio para concepto
    2 o 3 (Servicios / Productos y Servicios).
    Formato yyyymmdd

     */
public $FchServDesde;
    /*
     * Fecha de fin del abono para el servicio a
    facturar. Dato obligatorio para concepto
    2 o 3 (Servicios / Productos y Servicios).
    Formato yyyymmdd. FchServHasta no
    puede ser menor a FchServDesde

     */
public $FchServHasta;

    /*
     * Fecha de vencimiento del pago servicio a
    facturar. Dato obligatorio para concepto
    2 o 3 (Servicios / Productos y Servicios).
    Formato yyyymmdd. Debe ser igual o
    posterior a la fecha del comprobante.

     */
public $FchVtoPago;

    /*
     * Código de moneda del comprobante.
    Consultar método
    FEParamGetTiposMonedas para valores
    posibles PESOS por defecto

     */
public $MonId = "PES";
    /*
     * Cotización de la moneda informada. Para
    PES, pesos argentinos la misma debe
    ser 1

     */

public $MonCotiz = 1;


    public $Iva ;
        
}