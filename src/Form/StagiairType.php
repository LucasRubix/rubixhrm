<?php

namespace App\Form;

use App\Entity\Stagiair;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StagiairType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urentotaal')
            ->add('begindatum')
            ->add('einddatum')
            ->add('school')
            ->add('contactpersoon')
            ->add('contactpersoon_email')
            ->add('contactpersoon_telefoonnr')
            ->add('User_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stagiair::class,
        ]);
    }
}
