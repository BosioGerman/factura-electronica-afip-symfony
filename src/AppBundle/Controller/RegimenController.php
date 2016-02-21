<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Regimen;
use AppBundle\Form\RegimenType;

/**
 * Regimen controller.
 *
 * @Route("/regimen")
 */
class RegimenController extends Controller
{

    /**
     * Lists all Regimen entities.
     *
     * @Route("/", name="regimen")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Regimen')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Regimen entity.
     *
     * @Route("/", name="regimen_create")
     * @Method("POST")
     * @Template("AppBundle:Regimen:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Regimen();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regimen_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Regimen entity.
     *
     * @param Regimen $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Regimen $entity)
    {
        $form = $this->createForm(new RegimenType(), $entity, array(
            'action' => $this->generateUrl('regimen_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Regimen entity.
     *
     * @Route("/new", name="regimen_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Regimen();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Regimen entity.
     *
     * @Route("/{id}", name="regimen_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Regimen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regimen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Regimen entity.
     *
     * @Route("/{id}/edit", name="regimen_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Regimen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regimen entity.');
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
    * Creates a form to edit a Regimen entity.
    *
    * @param Regimen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Regimen $entity)
    {
        $form = $this->createForm(new RegimenType(), $entity, array(
            'action' => $this->generateUrl('regimen_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Regimen entity.
     *
     * @Route("/{id}", name="regimen_update")
     * @Method("PUT")
     * @Template("AppBundle:Regimen:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Regimen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regimen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('regimen_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Regimen entity.
     *
     * @Route("/{id}", name="regimen_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Regimen')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Regimen entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regimen'));
    }

    /**
     * Creates a form to delete a Regimen entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('regimen_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
