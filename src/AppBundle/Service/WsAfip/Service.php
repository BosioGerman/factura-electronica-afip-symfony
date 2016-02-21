<?php

namespace AppBundle\Service\WsAfip;


/**
 * Web Service orientado  al  servicio  de Facturacion electronica RG2485 V1
 */
class Service extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'FECAESolicitar' => 'AppBundle\\Service\\WsAfip\\FECAESolicitar',
      'FEAuthRequest' => 'AppBundle\\Service\\WsAfip\\FEAuthRequest',
      'FECAERequest' => 'AppBundle\\Service\\WsAfip\\FECAERequest',
      'FECAECabRequest' => 'AppBundle\\Service\\WsAfip\\FECAECabRequest',
      'FECabRequest' => 'AppBundle\\Service\\WsAfip\\FECabRequest',
      'ArrayOfFECAEDetRequest' => 'AppBundle\\Service\\WsAfip\\ArrayOfFECAEDetRequest',
      'FECAEDetRequest' => 'AppBundle\\Service\\WsAfip\\FECAEDetRequest',
      'FEDetRequest' => 'AppBundle\\Service\\WsAfip\\FEDetRequest',
      'ArrayOfCbteAsoc' => 'AppBundle\\Service\\WsAfip\\ArrayOfCbteAsoc',
      'CbteAsoc' => 'AppBundle\\Service\\WsAfip\\CbteAsoc',
      'ArrayOfTributo' => 'AppBundle\\Service\\WsAfip\\ArrayOfTributo',
      'Tributo' => 'AppBundle\\Service\\WsAfip\\Tributo',
      'ArrayOfAlicIva' => 'AppBundle\\Service\\WsAfip\\ArrayOfAlicIva',
      'AlicIva' => 'AppBundle\\Service\\WsAfip\\AlicIva',
      'ArrayOfOpcional' => 'AppBundle\\Service\\WsAfip\\ArrayOfOpcional',
      'Opcional' => 'AppBundle\\Service\\WsAfip\\Opcional',
      'FECAESolicitarResponse' => 'AppBundle\\Service\\WsAfip\\FECAESolicitarResponse',
      'FECAEResponse' => 'AppBundle\\Service\\WsAfip\\FECAEResponse',
      'FECAECabResponse' => 'AppBundle\\Service\\WsAfip\\FECAECabResponse',
      'FECabResponse' => 'AppBundle\\Service\\WsAfip\\FECabResponse',
      'ArrayOfFECAEDetResponse' => 'AppBundle\\Service\\WsAfip\\ArrayOfFECAEDetResponse',
      'FECAEDetResponse' => 'AppBundle\\Service\\WsAfip\\FECAEDetResponse',
      'FEDetResponse' => 'AppBundle\\Service\\WsAfip\\FEDetResponse',
      'ArrayOfObs' => 'AppBundle\\Service\\WsAfip\\ArrayOfObs',
      'Obs' => 'AppBundle\\Service\\WsAfip\\Obs',
      'ArrayOfEvt' => 'AppBundle\\Service\\WsAfip\\ArrayOfEvt',
      'Evt' => 'AppBundle\\Service\\WsAfip\\Evt',
      'ArrayOfErr' => 'AppBundle\\Service\\WsAfip\\ArrayOfErr',
      'Err' => 'AppBundle\\Service\\WsAfip\\Err',
      'FECompTotXRequest' => 'AppBundle\\Service\\WsAfip\\FECompTotXRequest',
      'FECompTotXRequestResponse' => 'AppBundle\\Service\\WsAfip\\FECompTotXRequestResponse',
      'FERegXReqResponse' => 'AppBundle\\Service\\WsAfip\\FERegXReqResponse',
      'FEDummy' => 'AppBundle\\Service\\WsAfip\\FEDummy',
      'FEDummyResponse' => 'AppBundle\\Service\\WsAfip\\FEDummyResponse',
      'DummyResponse' => 'AppBundle\\Service\\WsAfip\\DummyResponse',
      'FECompUltimoAutorizado' => 'AppBundle\\Service\\WsAfip\\FECompUltimoAutorizado',
      'FECompUltimoAutorizadoResponse' => 'AppBundle\\Service\\WsAfip\\FECompUltimoAutorizadoResponse',
      'FERecuperaLastCbteResponse' => 'AppBundle\\Service\\WsAfip\\FERecuperaLastCbteResponse',
      'FECompConsultar' => 'AppBundle\\Service\\WsAfip\\FECompConsultar',
      'FECompConsultaReq' => 'AppBundle\\Service\\WsAfip\\FECompConsultaReq',
      'FECompConsultarResponse' => 'AppBundle\\Service\\WsAfip\\FECompConsultarResponse',
      'FECompConsultaResponse' => 'AppBundle\\Service\\WsAfip\\FECompConsultaResponse',
      'FECompConsResponse' => 'AppBundle\\Service\\WsAfip\\FECompConsResponse',
      'FECAEARegInformativo' => 'AppBundle\\Service\\WsAfip\\FECAEARegInformativo',
      'FECAEARequest' => 'AppBundle\\Service\\WsAfip\\FECAEARequest',
      'FECAEACabRequest' => 'AppBundle\\Service\\WsAfip\\FECAEACabRequest',
      'ArrayOfFECAEADetRequest' => 'AppBundle\\Service\\WsAfip\\ArrayOfFECAEADetRequest',
      'FECAEADetRequest' => 'AppBundle\\Service\\WsAfip\\FECAEADetRequest',
      'FECAEARegInformativoResponse' => 'AppBundle\\Service\\WsAfip\\FECAEARegInformativoResponse',
      'FECAEAResponse' => 'AppBundle\\Service\\WsAfip\\FECAEAResponse',
      'FECAEACabResponse' => 'AppBundle\\Service\\WsAfip\\FECAEACabResponse',
      'ArrayOfFECAEADetResponse' => 'AppBundle\\Service\\WsAfip\\ArrayOfFECAEADetResponse',
      'FECAEADetResponse' => 'AppBundle\\Service\\WsAfip\\FECAEADetResponse',
      'FECAEASolicitar' => 'AppBundle\\Service\\WsAfip\\FECAEASolicitar',
      'FECAEASolicitarResponse' => 'AppBundle\\Service\\WsAfip\\FECAEASolicitarResponse',
      'FECAEAGetResponse' => 'AppBundle\\Service\\WsAfip\\FECAEAGetResponse',
      'FECAEAGet' => 'AppBundle\\Service\\WsAfip\\FECAEAGet',
      'FECAEASinMovimientoConsultar' => 'AppBundle\\Service\\WsAfip\\FECAEASinMovimientoConsultar',
      'FECAEASinMovimientoConsultarResponse' => 'AppBundle\\Service\\WsAfip\\FECAEASinMovimientoConsultarResponse',
      'FECAEASinMovConsResponse' => 'AppBundle\\Service\\WsAfip\\FECAEASinMovConsResponse',
      'ArrayOfFECAEASinMov' => 'AppBundle\\Service\\WsAfip\\ArrayOfFECAEASinMov',
      'FECAEASinMov' => 'AppBundle\\Service\\WsAfip\\FECAEASinMov',
      'FECAEASinMovimientoInformar' => 'AppBundle\\Service\\WsAfip\\FECAEASinMovimientoInformar',
      'FECAEASinMovimientoInformarResponse' => 'AppBundle\\Service\\WsAfip\\FECAEASinMovimientoInformarResponse',
      'FECAEASinMovResponse' => 'AppBundle\\Service\\WsAfip\\FECAEASinMovResponse',
      'FECAEAConsultar' => 'AppBundle\\Service\\WsAfip\\FECAEAConsultar',
      'FECAEAConsultarResponse' => 'AppBundle\\Service\\WsAfip\\FECAEAConsultarResponse',
      'FEParamGetCotizacion' => 'AppBundle\\Service\\WsAfip\\FEParamGetCotizacion',
      'FEParamGetCotizacionResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetCotizacionResponse',
      'FECotizacionResponse' => 'AppBundle\\Service\\WsAfip\\FECotizacionResponse',
      'Cotizacion' => 'AppBundle\\Service\\WsAfip\\Cotizacion',
      'FEParamGetTiposTributos' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposTributos',
      'FEParamGetTiposTributosResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposTributosResponse',
      'FETributoResponse' => 'AppBundle\\Service\\WsAfip\\FETributoResponse',
      'ArrayOfTributoTipo' => 'AppBundle\\Service\\WsAfip\\ArrayOfTributoTipo',
      'TributoTipo' => 'AppBundle\\Service\\WsAfip\\TributoTipo',
      'FEParamGetTiposMonedas' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposMonedas',
      'FEParamGetTiposMonedasResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposMonedasResponse',
      'MonedaResponse' => 'AppBundle\\Service\\WsAfip\\MonedaResponse',
      'ArrayOfMoneda' => 'AppBundle\\Service\\WsAfip\\ArrayOfMoneda',
      'Moneda' => 'AppBundle\\Service\\WsAfip\\Moneda',
      'FEParamGetTiposIva' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposIva',
      'FEParamGetTiposIvaResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposIvaResponse',
      'IvaTipoResponse' => 'AppBundle\\Service\\WsAfip\\IvaTipoResponse',
      'ArrayOfIvaTipo' => 'AppBundle\\Service\\WsAfip\\ArrayOfIvaTipo',
      'IvaTipo' => 'AppBundle\\Service\\WsAfip\\IvaTipo',
      'FEParamGetTiposOpcional' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposOpcional',
      'FEParamGetTiposOpcionalResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposOpcionalResponse',
      'OpcionalTipoResponse' => 'AppBundle\\Service\\WsAfip\\OpcionalTipoResponse',
      'ArrayOfOpcionalTipo' => 'AppBundle\\Service\\WsAfip\\ArrayOfOpcionalTipo',
      'OpcionalTipo' => 'AppBundle\\Service\\WsAfip\\OpcionalTipo',
      'FEParamGetTiposConcepto' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposConcepto',
      'FEParamGetTiposConceptoResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposConceptoResponse',
      'ConceptoTipoResponse' => 'AppBundle\\Service\\WsAfip\\ConceptoTipoResponse',
      'ArrayOfConceptoTipo' => 'AppBundle\\Service\\WsAfip\\ArrayOfConceptoTipo',
      'ConceptoTipo' => 'AppBundle\\Service\\WsAfip\\ConceptoTipo',
      'FEParamGetPtosVenta' => 'AppBundle\\Service\\WsAfip\\FEParamGetPtosVenta',
      'FEParamGetPtosVentaResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetPtosVentaResponse',
      'FEPtoVentaResponse' => 'AppBundle\\Service\\WsAfip\\FEPtoVentaResponse',
      'ArrayOfPtoVenta' => 'AppBundle\\Service\\WsAfip\\ArrayOfPtoVenta',
      'PtoVenta' => 'AppBundle\\Service\\WsAfip\\PtoVenta',
      'FEParamGetTiposCbte' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposCbte',
      'FEParamGetTiposCbteResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposCbteResponse',
      'CbteTipoResponse' => 'AppBundle\\Service\\WsAfip\\CbteTipoResponse',
      'ArrayOfCbteTipo' => 'AppBundle\\Service\\WsAfip\\ArrayOfCbteTipo',
      'CbteTipo' => 'AppBundle\\Service\\WsAfip\\CbteTipo',
      'FEParamGetTiposDoc' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposDoc',
      'FEParamGetTiposDocResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposDocResponse',
      'DocTipoResponse' => 'AppBundle\\Service\\WsAfip\\DocTipoResponse',
      'ArrayOfDocTipo' => 'AppBundle\\Service\\WsAfip\\ArrayOfDocTipo',
      'DocTipo' => 'AppBundle\\Service\\WsAfip\\DocTipo',
      'FEParamGetTiposPaises' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposPaises',
      'FEParamGetTiposPaisesResponse' => 'AppBundle\\Service\\WsAfip\\FEParamGetTiposPaisesResponse',
      'FEPaisResponse' => 'AppBundle\\Service\\WsAfip\\FEPaisResponse',
      'ArrayOfPaisTipo' => 'AppBundle\\Service\\WsAfip\\ArrayOfPaisTipo',
      'PaisTipo' => 'AppBundle\\Service\\WsAfip\\PaisTipo',
    );

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = 'https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL')
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      parent::__construct($wsdl, $options);
    }

    /**
     * Solicitud de Código de Autorización Electrónico (CAE)
     *
     * @param FECAESolicitar $parameters
     * @return FECAESolicitarResponse
     */
    public function FECAESolicitar(FECAESolicitar $parameters)
    {
      return $this->__soapCall('FECAESolicitar', array($parameters));
    }

    /**
     * Retorna la cantidad maxima de registros que puede tener una invocacion al metodo FECAESolicitar / FECAEARegInformativo
     *
     * @param FECompTotXRequest $parameters
     * @return FECompTotXRequestResponse
     */
    public function FECompTotXRequest(FECompTotXRequest $parameters)
    {
      return $this->__soapCall('FECompTotXRequest', array($parameters));
    }

    /**
     * Metodo dummy para verificacion de funcionamiento
     *
     * @param FEDummy $parameters
     * @return FEDummyResponse
     */
    public function FEDummy(FEDummy $parameters)
    {
      return $this->__soapCall('FEDummy', array($parameters));
    }

    /**
     * Retorna el ultimo comprobante autorizado para el tipo de comprobante / cuit / punto de venta ingresado / Tipo de Emisión
     *
     * @param FECompUltimoAutorizado $parameters
     * @return FECompUltimoAutorizadoResponse
     */
    public function FECompUltimoAutorizado(FECompUltimoAutorizado $parameters)
    {
      return $this->__soapCall('FECompUltimoAutorizado', array($parameters));
    }

    /**
     * Consulta Factura emitido y su código.
     *
     * @param FECompConsultar $parameters
     * @return FECompConsultarResponse
     */
    public function FECompConsultar(FECompConsultar $parameters)
    {
      return $this->__soapCall('FECompConsultar', array($parameters));
    }

    /**
     * Rendición de comprobantes asociados a un CAEA.
     *
     * @param FECAEARegInformativo $parameters
     * @return FECAEARegInformativoResponse
     */
    public function FECAEARegInformativo(FECAEARegInformativo $parameters)
    {
      return $this->__soapCall('FECAEARegInformativo', array($parameters));
    }

    /**
     * Solicitud de Código de Autorización Electrónico Anticipado (CAEA)
     *
     * @param FECAEASolicitar $parameters
     * @return FECAEASolicitarResponse
     */
    public function FECAEASolicitar(FECAEASolicitar $parameters)
    {
      return $this->__soapCall('FECAEASolicitar', array($parameters));
    }

    /**
     * Consulta CAEA informado como sin movimientos.
     *
     * @param FECAEASinMovimientoConsultar $parameters
     * @return FECAEASinMovimientoConsultarResponse
     */
    public function FECAEASinMovimientoConsultar(FECAEASinMovimientoConsultar $parameters)
    {
      return $this->__soapCall('FECAEASinMovimientoConsultar', array($parameters));
    }

    /**
     * Informa CAEA sin movimientos.
     *
     * @param FECAEASinMovimientoInformar $parameters
     * @return FECAEASinMovimientoInformarResponse
     */
    public function FECAEASinMovimientoInformar(FECAEASinMovimientoInformar $parameters)
    {
      return $this->__soapCall('FECAEASinMovimientoInformar', array($parameters));
    }

    /**
     * Consultar CAEA emitidos.
     *
     * @param FECAEAConsultar $parameters
     * @return FECAEAConsultarResponse
     */
    public function FECAEAConsultar(FECAEAConsultar $parameters)
    {
      return $this->__soapCall('FECAEAConsultar', array($parameters));
    }

    /**
     * Recupera la cotizacion de la moneda consultada y su  fecha
     *
     * @param FEParamGetCotizacion $parameters
     * @return FEParamGetCotizacionResponse
     */
    public function FEParamGetCotizacion(FEParamGetCotizacion $parameters)
    {
      return $this->__soapCall('FEParamGetCotizacion', array($parameters));
    }

    /**
     * Recupera el listado de los diferente tributos que pueden ser utilizados  en el servicio de autorizacion
     *
     * @param FEParamGetTiposTributos $parameters
     * @return FEParamGetTiposTributosResponse
     */
    public function FEParamGetTiposTributos(FEParamGetTiposTributos $parameters)
    {
      return $this->__soapCall('FEParamGetTiposTributos', array($parameters));
    }

    /**
     * Recupera el listado de monedas utilizables en servicio de autorización
     *
     * @param FEParamGetTiposMonedas $parameters
     * @return FEParamGetTiposMonedasResponse
     */
    public function FEParamGetTiposMonedas(FEParamGetTiposMonedas $parameters)
    {
      return $this->__soapCall('FEParamGetTiposMonedas', array($parameters));
    }

    /**
     * Recupera el listado  de Tipos de Iva utilizables en servicio de autorización.
     *
     * @param FEParamGetTiposIva $parameters
     * @return FEParamGetTiposIvaResponse
     */
    public function FEParamGetTiposIva(FEParamGetTiposIva $parameters)
    {
      return $this->__soapCall('FEParamGetTiposIva', array($parameters));
    }

    /**
     * Recupera el listado de identificadores para los campos Opcionales
     *
     * @param FEParamGetTiposOpcional $parameters
     * @return FEParamGetTiposOpcionalResponse
     */
    public function FEParamGetTiposOpcional(FEParamGetTiposOpcional $parameters)
    {
      return $this->__soapCall('FEParamGetTiposOpcional', array($parameters));
    }

    /**
     * Recupera el listado  de identificadores para el campo Concepto.
     *
     * @param FEParamGetTiposConcepto $parameters
     * @return FEParamGetTiposConceptoResponse
     */
    public function FEParamGetTiposConcepto(FEParamGetTiposConcepto $parameters)
    {
      return $this->__soapCall('FEParamGetTiposConcepto', array($parameters));
    }

    /**
     * Recupera el listado de puntos de venta registrados y su estado
     *
     * @param FEParamGetPtosVenta $parameters
     * @return FEParamGetPtosVentaResponse
     */
    public function FEParamGetPtosVenta(FEParamGetPtosVenta $parameters)
    {
      return $this->__soapCall('FEParamGetPtosVenta', array($parameters));
    }

    /**
     * Recupera el listado  de Tipos de Comprobantes utilizables en servicio de autorización.
     *
     * @param FEParamGetTiposCbte $parameters
     * @return FEParamGetTiposCbteResponse
     */
    public function FEParamGetTiposCbte(FEParamGetTiposCbte $parameters)
    {
      return $this->__soapCall('FEParamGetTiposCbte', array($parameters));
    }

    /**
     * Recupera el listado  de Tipos de Documentos utilizables en servicio de autorización.
     *
     * @param FEParamGetTiposDoc $parameters
     * @return FEParamGetTiposDocResponse
     */
    public function FEParamGetTiposDoc(FEParamGetTiposDoc $parameters)
    {
      return $this->__soapCall('FEParamGetTiposDoc', array($parameters));
    }

    /**
     * Recupera el listado de los diferente paises que pueden ser utilizados  en el servicio de autorizacion
     *
     * @param FEParamGetTiposPaises $parameters
     * @return FEParamGetTiposPaisesResponse
     */
    public function FEParamGetTiposPaises(FEParamGetTiposPaises $parameters)
    {
      return $this->__soapCall('FEParamGetTiposPaises', array($parameters));
    }

}
