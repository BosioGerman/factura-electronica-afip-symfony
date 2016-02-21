<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bienes' , 'entity', array(
                'class' => 'AppBundle\Entity\Bienes',
                'property' => 'nombre',
                'placeholder' => 'Select the product',
                'attr'=> array('class'=>'product'),


            ))

            ->add('cantidad', 'text', array('attr'=> array('class'=>'item_cantidad' ) ))
            ->add('precioUnitario', 'text', array('attr'=> array('class'=>'item_precioUnitario' ) ))
            ->add('porcentajeIva', 'text', array(
                'mapped' => false,
                'attr'=> array('class'=>'item_iva_porcentaje' ),
            ))
            ->add('iva', 'text', array(
                'attr'=> array('class'=>'item_iva' ),
            ))
            ->add('importe', 'text', array('attr'=> array('class'=>'item_importe' ) ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Item'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_item';
    }
}
