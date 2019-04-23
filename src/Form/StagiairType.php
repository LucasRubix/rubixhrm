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
            ->add('urentotaal', null, ['label' => 'Aantal uren'])
            ->add('urenperdag')
            ->add('begindatum')
            ->add('einddatum')
            ->add('school')
            ->add('contactpersoon')
            ->add('contactpersoon_email', null, ['label' => 'Emailadres Contactpersoon'])
            ->add('contactpersoon_telefoonnr', null, ['label' => 'Telefoonnummer Contactpersoon'])
            ->add('User_id', null, ['label' => 'User'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stagiair::class,
        ]);
    }
}
