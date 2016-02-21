<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('domicilioPostal')
            ->add('cuit')
            ->add('idTipo' , 'entity', array(
                'class' => 'AppBundle\Entity\DNITipo',
                'property' => 'nombre',
            ))
            ->add('condicionIva')
            ->add('deuda')
            ->add('regimen' , 'entity', array(
                'class' => 'AppBundle\Entity\Regimen',
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
            'data_class' => 'AppBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_cliente';
    }
}
