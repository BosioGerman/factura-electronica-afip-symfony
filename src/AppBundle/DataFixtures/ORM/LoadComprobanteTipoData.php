<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 17/11/15
 * Time: 12:12
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ComprobanteTipo;

class LoadComprobanteTipoData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $entity = new ComprobanteTipo();

        $entity->setNombre('admin');
        $entity->setAfipNombre('test');
        $entity->setAfipId('test');
        $entity->setRegimen('test');
        $manager->persist($entity);

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

        $manager->flush();
    }
}