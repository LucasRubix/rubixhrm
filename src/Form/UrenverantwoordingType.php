<?php

namespace App\Form;

use App\Entity\Urenverantwoording;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UrenverantwoordingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum')
            ->add('uren')
            ->add('begintijd')
            ->add('eindtijd')
            ->add('omschrijving')
            ->add('goedgekeurd')
            ->add('Stagiair_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Urenverantwoording::class,
        ]);
    }
}
