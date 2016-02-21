<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReglaComprobanteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emisorRegimen' , 'entity', array(
                'class' => 'AppBundle\Entity\Regimen',
                'property' => 'nombre',
            ))
            ->add('clienteRegimen' , 'entity', array(
                'class' => 'AppBundle\Entity\Regimen',
                'property' => 'nombre',
            ))
            ->add('comprobanteTipo' , 'entity', array(
                'class' => 'AppBundle\Entity\Comprobante',
                'property' => 'nombre',
            ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ReglaComprobante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_reglacomprobante';
    }
}
