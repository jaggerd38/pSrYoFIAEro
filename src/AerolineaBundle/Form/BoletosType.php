<?php

namespace AerolineaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BoletosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('clase',ChoiceType::class,array(
                "label" => "Clase",
                    "choices"=> array(
                        "Turista " =>"Turista",
                        "Ejecutivo" =>"Ejecutivo",
                        "Primero Clase" => "Primera Clase",
                      )
          ))
        ->add('costo')
        ->add('numeroasiento')
        ->add('idPasajero', EntityType::class, array(
          'label' => 'Pasajeros',
          'class' => 'AerolineaBundle:Pasajero',
          'choice_label' => 'name',
      ))
        ->add('idVuelo', EntityType::class, array(
          'label' => 'No. Vuelo',
          'class' => 'AerolineaBundle:Vuelo',
          'choice_label' => 'id',
      ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AerolineaBundle\Entity\Boletos'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'aerolineabundle_boletos';
    }


}
