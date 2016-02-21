<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\MonedaTipo;
use AppBundle\Form\MonedaTipoType;

/**
 * MonedaTipo controller.
 *
 * @Route("/monedatipo")
 */
class MonedaTipoController extends Controller
{

    /**
     * Lists all MonedaTipo entities.
     *
     * @Route("/", name="monedatipo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:MonedaTipo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MonedaTipo entity.
     *
     * @Route("/", name="monedatipo_create")
     * @Method("POST")
     * @Template("AppBundle:MonedaTipo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MonedaTipo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('monedatipo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a MonedaTipo entity.
     *
     * @param MonedaTipo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MonedaTipo $entity)
    {
        $form = $this->createForm(new MonedaTipoType(), $entity, array(
            'action' => $this->generateUrl('monedatipo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MonedaTipo entity.
     *
     * @Route("/new", name="monedatipo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MonedaTipo();
        $form   = $this->createCreateForm($entity);

        $awsc =  $this->get("afip.web.service.client");
        $ws =  $awsc->getClient();

        $respuesta = $ws->FEParamGetTiposMonedas ($awsc->getAuth());
        $s = $respuesta->FEParamGetTiposMonedasResult->ResultGet->Moneda;

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:MonedaTipo');


        //foreach ($s as $obj){

            $is = $entities->findOneBy(array ('afipId' => $s->Id) );
            if($is == null) {
                $entity2 = new MonedaTipo();
                $entity2->setAfipId($s->Id);
                $entity2->setAfipNombre($s->Desc);
                $entity2->setNombre($s->Desc);
                $entity2->setActivado(true);
                $em->persist($entity2);
                $em->flush();
            }

        //}


        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MonedaTipo entity.
     *
     * @Route("/{id}", name="monedatipo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:MonedaTipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MonedaTipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MonedaTipo entity.
     *
     * @Route("/{id}/edit", name="monedatipo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:MonedaTipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MonedaTipo entity.');
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
    * Creates a form to edit a MonedaTipo entity.
    *
    * @param MonedaTipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MonedaTipo $entity)
    {
        $form = $this->createForm(new MonedaTipoType(), $entity, array(
            'action' => $this->generateUrl('monedatipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MonedaTipo entity.
     *
     * @Route("/{id}", name="monedatipo_update")
     * @Method("PUT")
     * @Template("AppBundle:MonedaTipo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:MonedaTipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MonedaTipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('monedatipo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MonedaTipo entity.
     *
     * @Route("/{id}", name="monedatipo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:MonedaTipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MonedaTipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('monedatipo'));
    }

    /**
     * Creates a form to delete a MonedaTipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('monedatipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
