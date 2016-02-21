<?php

namespace AppBundle\Form;

use AppBundle\Form\ItemType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacturaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaServicioFin')
            ->add('fechaServicioInicio')
            ->add('fechaEmision')
            ->add('fechaVencimiento')
            ->add('codigoAutorizacionElectronico')
            ->add('puntoVenta' , 'entity', array(
                'class' => 'AppBundle\Entity\PuntoVenta',
                'property' => 'numero',
            ))
            ->add('subtotal')
            ->add('iva')
            ->add('total')
            ->add('cliente' , 'entity', array(
                'class' => 'AppBundle\Entity\Cliente',
                'property' => 'nombre',
            ))
            ->add('comprobanteTipo' , 'entity', array(
                'class' => 'AppBundle\Entity\Comprobante',
                'property' => 'nombre',
                'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                     return $er->createQueryBuilder('p')
                        ->select('c')
                        ->from('AppBundle:Comprobante', 'c')
                        ->where('c.regimen = :regimen')
                        ->setParameter('regimen', 1)
                    ;
                }
            ))
            ->add('conceptoTipo' , 'entity', array(
                'class' => 'AppBundle\Entity\Concepto',
                'property' => 'nombre',
                'placeholder' => 'Select the product',
                'attr'=> array('class'=>'conceptoTipo')
            ))
            ->add('items', 'collection', array(
                'type' => new ItemType(),
                'allow_add' => true,
                'allow_delete' => true,
                'cascade_validation' => true,
                'by_reference' => false,
                'required' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Factura'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_factura';
    }
}
