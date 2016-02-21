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
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\DNITipo;

class LoadDNITipoData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $auth = new \stdClass();
        $auth->Auth = $this->container->get('afip.auth.provider')->getAuth();
        $client = new \SoapClient("https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL");

        $respuesta = $client->FEParamGetTiposCbte($auth);
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

        $comprobanteNumero = $this->get('afip.comprobante.numero.provider')->getNewComprobanteNumero($entity->getPuntoVenta());


        $entity->setNumeroComprobante($comprobanteNumero );
        $auth->FeCAEReq = ServicioFacturaC::setOperationValuesData($entity);


        $res = $client->    FECAESolicitar        ($auth);
        $entity = new DNITipo();

        $entity->setNombre("CUIT");
        $entity->setAfipNombre("CUIT");
        $entity->setAfipId(80);
        $entity->setActivado(true);

        $manager->persist($entity);

        $entity->setNombre("DNI");
        $entity->setAfipNombre("DNI");
        $entity->setAfipId(96);
        $entity->setActivado(true);

        $manager->persist($entity);



        $manager->flush();
    }
}