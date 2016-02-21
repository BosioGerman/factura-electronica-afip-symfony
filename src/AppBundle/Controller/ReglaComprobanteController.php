<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\ReglaComprobante;
use AppBundle\Form\ReglaComprobanteType;

/**
 * ReglaComprobante controller.
 *
 * @Route("/reglacomprobante")
 */
class ReglaComprobanteController extends Controller
{

    /**
     * Lists all ReglaComprobante entities.
     *
     * @Route("/", name="reglacomprobante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ReglaComprobante')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ReglaComprobante entity.
     *
     * @Route("/", name="reglacomprobante_create")
     * @Method("POST")
     * @Template("AppBundle:ReglaComprobante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ReglaComprobante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reglacomprobante_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ReglaComprobante entity.
     *
     * @param ReglaComprobante $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ReglaComprobante $entity)
    {
        $form = $this->createForm(new ReglaComprobanteType(), $entity, array(
            'action' => $this->generateUrl('reglacomprobante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ReglaComprobante entity.
     *
     * @Route("/new", name="reglacomprobante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ReglaComprobante();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ReglaComprobante entity.
     *
     * @Route("/{id}", name="reglacomprobante_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ReglaComprobante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReglaComprobante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ReglaComprobante entity.
     *
     * @Route("/{id}/edit", name="reglacomprobante_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ReglaComprobante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReglaComprobante entity.');
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
    * Creates a form to edit a ReglaComprobante entity.
    *
    * @param ReglaComprobante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ReglaComprobante $entity)
    {
        $form = $this->createForm(new ReglaComprobanteType(), $entity, array(
            'action' => $this->generateUrl('reglacomprobante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ReglaComprobante entity.
     *
     * @Route("/{id}", name="reglacomprobante_update")
     * @Method("PUT")
     * @Template("AppBundle:ReglaComprobante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ReglaComprobante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ReglaComprobante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reglacomprobante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ReglaComprobante entity.
     *
     * @Route("/{id}", name="reglacomprobante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ReglaComprobante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ReglaComprobante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reglacomprobante'));
    }

    /**
     * Creates a form to delete a ReglaComprobante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reglacomprobante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
