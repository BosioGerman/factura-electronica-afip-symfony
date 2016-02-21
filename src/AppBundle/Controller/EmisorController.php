<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Emisor;
use AppBundle\Form\EmisorType;

/**
 * Emisor controller.
 *
 * @Route("/emisor")
 */
class EmisorController extends Controller
{

    /**
     * Lists all Emisor entities.
     *
     * @Route("/", name="emisor")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Emisor')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Emisor entity.
     *
     * @Route("/", name="emisor_create")
     * @Method("POST")
     * @Template("AppBundle:Emisor:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Emisor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('emisor_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Emisor entity.
     *
     * @param Emisor $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Emisor $entity)
    {
        $form = $this->createForm(new EmisorType(), $entity, array(
            'action' => $this->generateUrl('emisor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Emisor entity.
     *
     * @Route("/new", name="emisor_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Emisor();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Emisor entity.
     *
     * @Route("/{id}", name="emisor_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Emisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Emisor entity.
     *
     * @Route("/{id}/edit", name="emisor_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Emisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emisor entity.');
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
    * Creates a form to edit a Emisor entity.
    *
    * @param Emisor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Emisor $entity)
    {
        $form = $this->createForm(new EmisorType(), $entity, array(
            'action' => $this->generateUrl('emisor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Emisor entity.
     *
     * @Route("/{id}", name="emisor_update")
     * @Method("PUT")
     * @Template("AppBundle:Emisor:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Emisor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emisor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('emisor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Emisor entity.
     *
     * @Route("/{id}", name="emisor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Emisor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Emisor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('emisor'));
    }

    /**
     * Creates a form to delete a Emisor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emisor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
