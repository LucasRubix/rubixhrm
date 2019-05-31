<?php

namespace App\Form;

use App\Entity\Vrijvragen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;


class VrijvragenType extends AbstractType
{

    protected $security;

    public function __construct( Security $security ) {
        $this->security = $security;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('begindatum', null, array('label' => 'Begindatum', 'years' => range(date('Y'), date('Y') + 0),))
            ->add('einddatum', null, array('label' => 'Einddatum', 'years' => range(date('Y'), date('Y') + 2),))
            ->add('uren')
            ->add('begintijd')
            ->add('eindtijd')

            ->add('reden')
            ->add('reden')
            ->add('User_id', null, array('label' => false, 'attr'=>array('style' => 'display:none')));

            if ( $this->security->isGranted( "ROLE_SUPER_ADMIN" ) ) {
                $builder
                    ->add('goedgekeurd', ChoiceType::class, [
                    'choices' => ['In Behandeling' => 'behandeling', 'Goedgekeurd' => 'goedgekeurd', 'Afgekeurd' => 'afgekeurd'],
                ])
                    ->add('User_id');
        ;
    }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vrijvragen::class,
        ]);
    }
}
