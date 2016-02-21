<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Concepto;
use AppBundle\Form\ConceptoType;

/**
 * Concepto controller.
 *
 * @Route("/concepto")
 */
class ConceptoController extends Controller
{

    /**
     * Lists all Concepto entities.
     *
     * @Route("/", name="concepto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Concepto')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Concepto entity.
     *
     * @Route("/", name="concepto_create")
     * @Method("POST")
     * @Template("AppBundle:Concepto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Concepto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('concepto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Concepto entity.
     *
     * @param Concepto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Concepto $entity)
    {
        $form = $this->createForm(new ConceptoType(), $entity, array(
            'action' => $this->generateUrl('concepto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Concepto entity.
     *
     * @Route("/new", name="concepto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Concepto();
        $form   = $this->createCreateForm($entity);


        $awsc =  $this->get("afip.web.service.client");
        $ws =  $awsc->getClient();

        $respuesta = $ws->FEParamGetTiposConcepto($awsc->getAuth());
        $s = $respuesta->FEParamGetTiposConceptoResult->ResultGet->ConceptoTipo;

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Concepto');

        echo count($s);
        foreach ($s as $obj){

            $is = $entities->findOneBy(array ('afipId' => $obj->Id) );
            if($is != null) {
                continue;
            }
            $entity2 = new Concepto();
            $entity2->setAfipId($obj->Id);
            $entity2->setAfipNombre($obj->Desc);
            $entity2->setNombre($obj->Desc);
            $entity2->setActivado(true);
            $em->persist($entity2);
        }
        $em->flush();


        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Concepto entity.
     *
     * @Route("/{id}", name="concepto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Concepto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concepto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Concepto entity.
     *
     * @Route("/{id}/edit", name="concepto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Concepto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concepto entity.');
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
    * Creates a form to edit a Concepto entity.
    *
    * @param Concepto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Concepto $entity)
    {
        $form = $this->createForm(new ConceptoType(), $entity, array(
            'action' => $this->generateUrl('concepto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Concepto entity.
     *
     * @Route("/{id}", name="concepto_update")
     * @Method("PUT")
     * @Template("AppBundle:Concepto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Concepto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Concepto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('concepto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Concepto entity.
     *
     * @Route("/{id}", name="concepto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Concepto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Concepto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('concepto'));
    }

    /**
     * Creates a form to delete a Concepto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concepto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
