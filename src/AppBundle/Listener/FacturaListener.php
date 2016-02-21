<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 08/10/15
 * Time: 21:11
 */

namespace AppBundle\Listener;

use Doctrine\ORM\Event\OnFlushEventArgs;
use AppBundle\Entity\Factura;

class FacturaListener
{
    public function onFlush(OnFlushEventArgs $eventArgs)
    {

        $em = $eventArgs->getEntityManager();
        $uow = $em->getUnitOfWork();
        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            if($entity instanceof Factura) {


                $meta = $em->getClassMetadata(get_class($entity->getProducto()));
                $metaCosto = $em->getClassMetadata(get_class($entity));
                $uow->recomputeSingleEntityChangeSet($meta, $entity->getProducto());
                $uow->recomputeSingleEntityChangeSet($metaCosto, $entity);
            }
        }
        foreach ($uow->getScheduledEntityUpdates() as $entity) {
            if($entity instanceof Factura) {

                /*$changeSet = ($uow->getEntityChangeSet($entity));
                $changes["new"] = $changeSet["cantidad"][1];
                $changes["old"] = $changeSet["cantidad"][0];

                 $manager = ItemManagerFactory::getDetalleManager($entity);
                $manager->editItem($changes);

                $meta = $em->getClassMetadata(get_class($entity->getProducto()));
                $uow->recomputeSingleEntityChangeSet($meta, $entity->getProducto());*/

            }

        }
        foreach ($uow->getScheduledEntityDeletions() as $entity) {
            if($entity instanceof Factura) {
                /*$manager = ItemManagerFactory::getDetalleManager($entity);
                $manager->deleteItem();
                $meta = $em->getClassMetadata(get_class($entity->getProducto()));
                $uow->recomputeSingleEntityChangeSet($meta, $entity->getProducto());*/
            }
            /*if($entity instanceof DetalleCompra) {
                $cantidadComprada = $entity->getCantidad();
                $cantidadTotal = $entity->getProducto()->getCantidad();
                $cantidadOriginal = $cantidadTotal - $cantidadComprada;

                $costoNuevo = $entity->getCosto();
                $costoAjustado = $entity->getProducto()->getCostoAjustado();

                $total = $costoAjustado * $cantidadTotal;
                $costoCantidadNueva = $costoNuevo * $cantidadComprada;
                $costoCantidadOriginal =  $total - $costoCantidadNueva;
                if($cantidadOriginal == 0){
                    $costoOriginal = 0;
                }else{
                    $costoOriginal = $costoCantidadOriginal/$cantidadOriginal;
                }
                $entity->getProducto()->setCosto($costoOriginal);
                $entity->getProducto()->setCostoAjustado($costoOriginal);
                $entity->getProducto()->decrementarCantidad($entity->getCantidad());

                $meta = $em->getClassMetadata(get_class($entity->getProducto()));
                $uow->recomputeSingleEntityChangeSet($meta, $entity->getProducto());
            }*/
        }


    }

}
