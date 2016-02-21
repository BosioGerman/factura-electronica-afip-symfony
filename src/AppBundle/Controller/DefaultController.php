<?php

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Service\WsAfip\FECAERequest;
use AppBundle\Service\WsAfip\FECAESolicitar;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Token;
use Symfony\Component\Security\Acl\Exception\Exception;
use AppBundle\Service\WsAfip\Service;
use AppBundle\Service\WsAfip\FEDummy;
use AppBundle\Service\WsAfip\FEParamGetTiposMonedas;
use AppBundle\Service\WsAfip\FEAuthRequest;
use AppBundle\Service\WsAfip\FECAECabRequest;
use AppBundle\Service\WsAfip\FECAEDetRequest;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/hello", name="hello_test")
     */
    public function helloAction(Request $request)
    {
     $response = new Response();
     $response->setContent("hello");
     $response->headers->set('Content-Type', 'text/plain');
     return $response;
    }

    /**
     * @Route("/create2", name="create2")
     */
    public function create2Action(Request $request)
    {
        try {
        $tp = $this->get("afip.token.provider");
        $token = $tp->getToken();
        }catch (Exception $e){
            var_dump($e);
        }
        $data =
        $client = new \SoapClient("https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL");
        $k = $this->get("kernel");
        $cuit_file = $k->locateResource("@AppBundle/Certs/cuit.txt");
        $cuit = file_get_contents($cuit_file);
        if(!$cuit){
            throw new Exception("Escriba su cuit en AppBundle/Certs/cuit.txt");
        }



        $authElement = new FEAuthRequest($cuit);
        $authElement->setSign($token->getSign());
        $authElement->setToken($token->getValue());

        $cantidadRequetida = 1;
        $puntoVenta = 0001;
        $comprobanteTipo = 11;
        $fecabrequest = new FECAECabRequest($cantidadRequetida, $puntoVenta, $comprobanteTipo);




        $fecaerequest = new FECAERequest();
        $fecaerequest->setFeCabReq($fecabrequest);
        $fecaerequest->setFeDetReq($fecaedetrequest);

        $caeargs = new FECAESolicitar($authElement, $fecaerequest);


        $clientAfipWs = new Service();
        $response = $clientAfipWs->FECAESolicitar($caeargs);

        print_r($response);


        $response = new Response();
        $response->setContent("");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;

    }


    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request)
    {
        try {
            $tp = $this->get("afip.token.provider");
            $token = $tp->getToken();
        }catch (Exception $e){
            var_dump($e);
        }

        $client = new \SoapClient("https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL");
        $k = $this->get("kernel");

        $cuit_file = $k->locateResource("@AppBundle/Certs/cuit.txt");
        $cuit = file_get_contents($cuit_file);
        if(!$cuit){
            throw new Exception("Escriba su cuit en AppBundle/Certs/cuit.txt");
        }


        $obj = new \stdClass();
        $obj->Token = $token->getValue();
        $obj->Sign = $token->getSign();
        $obj->Cuit = $cuit;

        $auth = new \stdClass();
        $auth->Auth = $obj;


        $FeCompConsReq = new \stdClass();

        $FeCompConsReq->PtoVta = 3;
        $FeCompConsReq->CbteTipo = 1;
        $FeCompConsReq->CbteNro = 2;

        $auth->FeCompConsReq = $FeCompConsReq;

        $res = $client->FECompConsultar($auth);

        var_dump($res);
        print_r($res);


        $method = new \stdClass();
        $method->FEParamGetTiposConcepto = $auth;


        /*
         * informacion de cabeccera del cobrobante o lote de comprobantes ingresante
         * */
        $FeCabReq = new \stdClass();
        /*
         *  Cantidad de registros del detalle del
         *  comprobante o lote de comprobantes de
         *  ingreso
         *
         */
        $FeCabReq->CantReg = 1;

        /*
         * Tipo de comprobante que se está
         * informando. Si se informa más de un
         * comprobante, todos deben ser del mismo
         * tipo.
         *
         */

        $FeCabReq->CbteTipo = 11;


        /*
         * Punto de Venta del comprobante que se está
         *   informando. Si se informa más de un
         *   comprobante, todos deben corresponder al
         *   mismo punto de venta.
         *
         */
        $FeCabReq->PtoVta = 0001;


        $FECAEDetRequest = new \stdClass();
        /*
         * Concepto del Comprobante. Valores
            permitidos:
            1 Productos
            2 Servicios
            3 Productos y Servicios

         */
        $FECAEDetRequest->Concepto = 1;
        /*
         * Código de documento identificatorio del
            comprador
         */

        $FECAEDetRequest->DocTipo = 96;

        /*
         * Nro. De identificación del comprador
         */

        $FECAEDetRequest->DocNro = 11000000;

        /*
         * Nro. De comprobante desde
        Rango 1- 99999999

         */

        $FECAEDetRequest->CbteDesde = 1;
        /*Nro. De comprobante registrado hasta
            Rango 1- 99999999
        */

        $FECAEDetRequest->CbteHasta = 1;

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

        $FECAEDetRequest->CbteFch = 20151018;
        /*
         * Importe total del comprobante, Debe ser
igual a Importe neto no gravado + Importe
exento + Importe neto gravado + todos los
campos de IVA al XX% + Importe de
tributos.

         */
        $FECAEDetRequest->ImpTotal = 0;
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
        $FECAEDetRequest->ImpNeto = 0;
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
        $FECAEDetRequest->ImpIVA = 0;
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
        $FECAEDetRequest->FchServDesde = 1;
        /*
         * Fecha de fin del abono para el servicio a
        facturar. Dato obligatorio para concepto
        2 o 3 (Servicios / Productos y Servicios).
        Formato yyyymmdd. FchServHasta no
        puede ser menor a FchServDesde

         */
        $FECAEDetRequest->FchServHasta = 1;

        /*
         * Fecha de vencimiento del pago servicio a
        facturar. Dato obligatorio para concepto
        2 o 3 (Servicios / Productos y Servicios).
        Formato yyyymmdd. Debe ser igual o
        posterior a la fecha del comprobante.

         */
        $FECAEDetRequest->FchVtoPago = 1;

        /*
         * Código de moneda del comprobante.
        Consultar método
        FEParamGetTiposMonedas para valores
        posibles

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

        // $FECAEDetRequest->IVA = 1;

        /*
         * Array de campos auxiliares. Reservado
        usos futuros <Opcional>. Adicionales por
        R.G.

         */
        //     $FECAEDetRequest->Opcionales = 1;

        $FeCAEReq = new \stdClass();
        $FeCAEReq->FeCabReq = $FeCabReq;
        $FeCAEReq->FeDetReq = new \stdClass();
        $FeCAEReq->FeDetReq->FECAEDetRequest =$FECAEDetRequest;

        $obj22 = new \stdClass();
        $obj22->FeCAEReq = $FeCAEReq;

        $auth->FeCAEReq = $FeCAEReq;
        $auth->FeCompConsReq = new \stdClass();
        $auth->FeCompConsReq->CbteTipo = 11;
        $auth->FeCompConsReq->CbteNro = 1;
        $auth->FeCompConsReq->PtoVta = 0001;




//print_r($auth);

        //$res = $client->    FEParamGetTiposMonedas        ($auth);



        /*$res = $client->__call("FEParamGetTiposConcepto",
            ["FEParamGetTiposConcepto" =>
                [ "Auth" =>
                    [
                        "Token" => $token->getValue(),
                        "Sign" => $token->getSign(),
                        "Cuit" => $cuit
                    ],

                ]
            ]
        );*/
        /*foreach($res as $key => $value){
            foreach ($value as $key2 => $value2){
                foreach ($value2 as $key3 => $value3){
                    foreach ($value3 as $key4 => $value4){

                    }
                }
            }
        };-*/



        //$a = new TiposConcepto($res);
        //$s = $a->getTiposConcepto();

        //print_r($res);

        $ss = new Service();

        $arg = new FEDummy();

        $out = $ss->FEDummy($arg);

        $result = $out->getFEDummyResult();

        echo "appServer : " .  $result->getAppServer() . "\n";
        echo "appServer : " .  $result->getAuthServer() . "\n";
        echo "appServer : " .  $result->getDbServer() . "\n";

        $aoth = new FEAuthRequest($cuit);
        $aoth->setToken($token->getValue());
        $aoth->setSign($token->getSign());

        $arg2 = new FEParamGetTiposMonedas($aoth);
        $dataOut = $ss->FEParamGetTiposMonedas($arg2);
        $dataOut2 =$dataOut->getFEParamGetTiposMonedasResult();
        $dataOut3 = $dataOut2->getResultGet();
        $dataOut4 =$dataOut3->getMoneda();

        print_r($dataOut4[0]);



        $response = new Response();
        $response->setContent("");
        $response->headers->set('Content-Type', 'text/plain');
        return $response;

    }
}

class Formulario{
    public  function asd(){
        $data = array();
        $form = $this->createFormBuilder($data)
            ->add('query', 'text')
            ->add('category', 'choice',
                array('choices' => array(
                    'judges'   => 'Judges',
                    'interpreters' => 'Interpreters',
                    'attorneys'   => 'Attorneys',
                )))
            ->getForm();
    }
}

class TiposConcepto{

    protected $result;
    protected $conceptos;
    public function __construct($result){
        $this->result = $result;
        $this->getArray();
    }

    private function getArray(){
        $this->conceptos = [];
        foreach ($this->result->FEParamGetTiposConceptoResult->ResultGet->ConceptoTipo as $obj){
            $this->conceptos [] = get_object_vars($obj);
        }
    }

    public function getTiposConcepto(){
        return $this->conceptos;
    }



}
