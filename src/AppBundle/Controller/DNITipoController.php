<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\DNITipo;
use AppBundle\Form\DNITipoType;

/**
 * DNITipo controller.
 *
 * @Route("/dnitipo")
 */
class DNITipoController extends Controller
{

    /**
     * Lists all DNITipo entities.
     *
     * @Route("/", name="dnitipo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:DNITipo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new DNITipo entity.
     *
     * @Route("/", name="dnitipo_create")
     * @Method("POST")
     * @Template("AppBundle:DNITipo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DNITipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dnitipo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DNITipo entity.
     *
     * @param DNITipo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DNITipo $entity)
    {
        $form = $this->createForm(new DNITipoType(), $entity, array(
            'action' => $this->generateUrl('dnitipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DNITipo entity.
     *
     * @Route("/new", name="dnitipo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DNITipo();
        $form   = $this->createCreateForm($entity);

        $awsc =  $this->get("afip.web.service.client");
        $ws =  $awsc->getClient();

        $respuesta = $ws->FEParamGetTiposDoc($awsc->getAuth());
        $s = $respuesta->FEParamGetTiposDocResult->ResultGet->DocTipo;

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:DNITipo');

        echo count($s);
        foreach ($s as $obj){

            $is = $entities->findOneBy(array ('afipId' => $obj->Id) );
            if($is != null) {
                continue;
            }
            $entity2 = new DNITipo();
            $entity2->setAfipId($obj->Id);
            $entity2->setAfipNombre($obj->Desc);
            $entity2->setNombre($obj->Desc);
            $entity2->setActivado(false);
            $em->persist($entity2);
        }
        $em->flush();


        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DNITipo entity.
     *
     * @Route("/{id}", name="dnitipo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DNITipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DNITipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DNITipo entity.
     *
     * @Route("/{id}/edit", name="dnitipo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DNITipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DNITipo entity.');
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
    * Creates a form to edit a DNITipo entity.
    *
    * @param DNITipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DNITipo $entity)
    {
        $form = $this->createForm(new DNITipoType(), $entity, array(
            'action' => $this->generateUrl('dnitipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DNITipo entity.
     *
     * @Route("/{id}", name="dnitipo_update")
     * @Method("PUT")
     * @Template("AppBundle:DNITipo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:DNITipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DNITipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('dnitipo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DNITipo entity.
     *
     * @Route("/{id}", name="dnitipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:DNITipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DNITipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dnitipo'));
    }

    /**
     * Creates a form to delete a DNITipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dnitipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
