<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Factura;
use AppBundle\Form\FacturaType;
use AppBundle\Utility\ServicioFacturaC;
use AppBundle\Entity\NumeroComprobante;

/**
 * Factura controller.
 *
 * @Route("/factura")
 */
class FacturaController extends Controller
{

    /**
     * Lists all Factura entities.
     *
     * @Route("/", name="factura")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Factura')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Factura entity.
     *
     * @Route("/", name="factura_create")
     * @Method("POST")
     * @Template("AppBundle:Factura:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Factura();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();


            $client = new \SoapClient("https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL");

            $auth = new \stdClass();

            $auth->Auth = $this->get("afip.auth.provider")->getAuth();


            $comprobanteNumero = $this->get('afip.comprobante.numero.provider')->getNewComprobanteNumero($entity->getPuntoVenta());


            $entity->setNumeroComprobante($comprobanteNumero );
            $auth->FeCAEReq = ServicioFacturaC::setOperationValuesData($entity);


            $res = $client->    FECAESolicitar        ($auth);


            $cae = $res->FECAESolicitarResult->FeDetResp->FECAEDetResponse->CAE;


            if($res->FECAESolicitarResult->FeCabResp->Resultado === 'R'){

                if( isset ($res->FECAESolicitarResult->Errors)){
                    $error_numero = $res->FECAESolicitarResult->Errors->Err->Code;
                    $error_mensaje =  utf8_decode($res->FECAESolicitarResult->Errors->Err->Msg);
                    $this->addFlash(
                        'notice',  $error_mensaje . " error nro: " . $error_numero
                    );
                }
                else if($arr = $res->FECAESolicitarResult->FeDetResp->FECAEDetResponse->Observaciones->Obs ){
                    if(is_array($arr) ){
                        foreach ($arr as $key => $value){
                            $this->addFlash(
                                'notice',  utf8_decode($value->Msg) . " error nro: " . $value->Code
                            );
                        }
                    } else if(is_object($arr)){
                        $this->addFlash(
                            'notice',  utf8_decode($arr->Msg) . " error nro: " . $arr->Code
                        );
                    }

                }

                return array(
                    'entity' => $entity,
                    'form'   => $form->createView(),
                );

            }


            $entity->setCodigoAutorizacionElectronico($cae);
            $em->persist($comprobanteNumero);
            $em->persist($entity);
            $em->flush();


            return $this->redirect($this->generateUrl('factura_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Factura entity.
     *
     * @param Factura $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Factura $entity)
    {
        $form = $this->createForm(new FacturaType(), $entity, array(
            'action' => $this->generateUrl('factura_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Factura entity.
     *
     * @Route("/new", name="factura_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Factura();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Factura entity.
     *
     * @Route("/{id}", name="factura_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Factura')->find($id);
        //todo get the last Emisor, set up the emisor before to create factura
        $emisor = $em->getRepository('AppBundle:Emisor')->find(1);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'emisor'      => $emisor,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Factura entity.
     *
     * @Route("/{id}/edit", name="factura_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Factura entity.
    *
    * @param Factura $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Factura $entity)
    {
        $form = $this->createForm(new FacturaType(), $entity, array(
            'action' => $this->generateUrl('factura_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Factura entity.
     *
     * @Route("/{id}", name="factura_update")
     * @Method("PUT")
     * @Template("AppBundle:Factura:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('factura_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Factura entity.
     *
     * @Route("/{id}", name="factura_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Factura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Factura entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('factura'));
    }

    /**
     * Creates a form to delete a Factura entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factura_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
