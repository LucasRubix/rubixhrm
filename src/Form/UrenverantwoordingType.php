<?php

namespace App\Form;

use App\Entity\Urenverantwoording;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class UrenverantwoordingType extends AbstractType
{

    protected $security;

    public function __construct( Security $security ) {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum')
            ->add('uren')
            ->add('begintijd')
            ->add('eindtijd')
            ->add('omschrijving')
            ->add('Stagiair_id')
        ;

        if ( $this->security->isGranted( "ROLE_SUPER_ADMIN" ) ) {
            $builder
                ->add('goedgekeurd');
    }}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Urenverantwoording::class,
        ]);
    }
}
