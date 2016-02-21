<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Bienes;
use AppBundle\Form\BienesType;
use Symfony\Component\HttpFoundation\Response;


/**
 * Bienes controller.
 *
 * @Route("/bienes")
 */
class BienesController extends Controller
{

    /**
     * Lists all Bienes entities.
     *
     * @Route("/", name="bienes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Bienes')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Bienes entity.
     *
     * @Route("/", name="bienes_create")
     * @Method("POST")
     * @Template("AppBundle:Bienes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Bienes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bienes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Bienes entity.
     *
     * @param Bienes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bienes $entity)
    {
        $form = $this->createForm(new BienesType(), $entity, array(
            'action' => $this->generateUrl('bienes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Bienes entity.
     *
     * @Route("/new", name="bienes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Bienes();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Bienes entity.
     *
     * @Route("/{id}", name="bienes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Bienes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bienes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Bienes entity.
     *
     * @Route("/{id}/edit", name="bienes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Bienes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bienes entity.');
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
    * Creates a form to edit a Bienes entity.
    *
    * @param Bienes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bienes $entity)
    {
        $form = $this->createForm(new BienesType(), $entity, array(
            'action' => $this->generateUrl('bienes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bienes entity.
     *
     * @Route("/{id}", name="bienes_update")
     * @Method("PUT")
     * @Template("AppBundle:Bienes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Bienes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bienes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bienes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Bienes entity.
     *
     * @Route("/{id}", name="bienes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Bienes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bienes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bienes'));
    }

    /**
     * Creates a form to delete a Bienes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bienes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Get a Bienes entity.
     *
     * @Route("/api/{id}", name="bienes_get")
     * @Method("GET")
     */
    public function readAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->find('AppBundle:Bienes', $id);
        $serializer = $this->container->get('serializer');
        $jsonEntity = $serializer->serialize($entity, 'json');
        $response = new Response();
        $response->setContent($jsonEntity);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
