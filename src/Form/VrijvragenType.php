<?php

namespace App\Form;

use App\Entity\Vrijvragen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VrijvragenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('begindatum')
            ->add('einddatum')
            ->add('uren')
            ->add('begintijd')
            ->add('eindtijd')
            ->add('reden')
            ->add('goedgekeurd')
            ->add('User_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vrijvragen::class,
        ]);
    }
}
