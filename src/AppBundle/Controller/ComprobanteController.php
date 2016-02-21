<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Comprobante;
use AppBundle\Form\ComprobanteType;
use Wsdl2PhpGenerator\Generator;
use Wsdl2PhpGenerator\Config;

/**
 * Comprobante controller.
 *
 * @Route("/comprobante")
 */
class ComprobanteController extends Controller
{

    /**
     * Lists all Comprobante entities.
     *
     * @Route("/", name="comprobante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Comprobante')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Comprobante entity.
     *
     * @Route("/", name="comprobante_create")
     * @Method("POST")
     * @Template("AppBundle:Comprobante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Comprobante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comprobante_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Comprobante entity.
     *
     * @param Comprobante $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comprobante $entity)
    {
        $form = $this->createForm(new ComprobanteType(), $entity, array(
            'action' => $this->generateUrl('comprobante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Comprobante entity.
     *
     * @Route("/new", name="comprobante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Comprobante();
        $form   = $this->createCreateForm($entity);

        $awsc =  $this->get("afip.web.service.client");
        $ws =  $awsc->getClient();

        $respuesta = $ws->FEParamGetTiposCbte($awsc->getAuth());
        $s = $respuesta->FEParamGetTiposCbteResult->ResultGet->CbteTipo;

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Comprobante');

        echo count($s);
        foreach ($s as $obj){

            $is = $entities->findOneBy(array ('afipId' => $obj->Id) );
            if($is != null) {
                continue;
            }
            $entity2 = new Comprobante();
            $entity2->setAfipId($obj->Id);
            $entity2->setAfipNombre($obj->Desc);
            $entity2->setNombre($obj->Desc);
            $em->persist($entity2);
        }
        $em->flush();

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Comprobante entity.
     *
     * @Route("/{id}", name="comprobante_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Comprobante')->find($id);

        $k = $this->get("kernel");

        $path = $k->getRootDir();

        $tmplocation = $path ."/cache/dev/wsdl/";
        $generator = new Generator();
        $generator->generate(
            new Config(array(
                'inputFile' => 'https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL',
                'outputDir' => $tmplocation,
                'namespaceName' => 'AppBundle\Service\WsAfip'
            ))
        );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comprobante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Comprobante entity.
     *
     * @Route("/{id}/edit", name="comprobante_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Comprobante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comprobante entity.');
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
    * Creates a form to edit a Comprobante entity.
    *
    * @param Comprobante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Comprobante $entity)
    {
        $form = $this->createForm(new ComprobanteType(), $entity, array(
            'action' => $this->generateUrl('comprobante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Comprobante entity.
     *
     * @Route("/{id}", name="comprobante_update")
     * @Method("PUT")
     * @Template("AppBundle:Comprobante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Comprobante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comprobante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comprobante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Comprobante entity.
     *
     * @Route("/{id}", name="comprobante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Comprobante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comprobante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comprobante'));
    }

    /**
     * Creates a form to delete a Comprobante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comprobante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
