<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\IvaTipo;
use AppBundle\Form\IvaTipoType;

/**
 * IvaTipo controller.
 *
 * @Route("/ivatipo")
 */
class IvaTipoController extends Controller
{

    /**
     * Lists all IvaTipo entities.
     *
     * @Route("/", name="ivatipo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:IvaTipo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new IvaTipo entity.
     *
     * @Route("/", name="ivatipo_create")
     * @Method("POST")
     * @Template("AppBundle:IvaTipo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new IvaTipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);




        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ivatipo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a IvaTipo entity.
     *
     * @param IvaTipo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(IvaTipo $entity)
    {
        $form = $this->createForm(new IvaTipoType(), $entity, array(
            'action' => $this->generateUrl('ivatipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new IvaTipo entity.
     *
     * @Route("/new", name="ivatipo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new IvaTipo();
        $form   = $this->createCreateForm($entity);

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

        $auth->PtoVta = 1;
        $auth->CbteTipo = 11;
        $res = $client->FEParamGetTiposIva($auth);


        $s = $res->FEParamGetTiposIvaResult->ResultGet->IvaTipo;

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:IvaTipo');

        echo count($s);
        foreach ($s as $obj){

            $is = $entities->findOneBy(array ('afipId' => $obj->Id) );
            if($is != null) {
                continue;
            }
            $entity2 = new IvaTipo();
            $entity2->setAfipId($obj->Id);
            $entity2->setValor($obj->Desc);
            $entity2->setPorcentaje(floatval($obj->Desc/100));
            $em->persist($entity2);
        }
        $em->flush();

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a IvaTipo entity.
     *
     * @Route("/{id}", name="ivatipo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:IvaTipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IvaTipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing IvaTipo entity.
     *
     * @Route("/{id}/edit", name="ivatipo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:IvaTipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IvaTipo entity.');
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
    * Creates a form to edit a IvaTipo entity.
    *
    * @param IvaTipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(IvaTipo $entity)
    {
        $form = $this->createForm(new IvaTipoType(), $entity, array(
            'action' => $this->generateUrl('ivatipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing IvaTipo entity.
     *
     * @Route("/{id}", name="ivatipo_update")
     * @Method("PUT")
     * @Template("AppBundle:IvaTipo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:IvaTipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IvaTipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ivatipo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a IvaTipo entity.
     *
     * @Route("/{id}", name="ivatipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:IvaTipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find IvaTipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ivatipo'));
    }

    /**
     * Creates a form to delete a IvaTipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ivatipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
