<?php

namespace App\Form;

use App\Entity\Urenverantwoording;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Validator\Constraints\Choice;

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
            ->add('Stagiair_id');
        if ($this->security->isGranted("ROLE_SUPER_ADMIN")) {
            $builder
                ->add('goedgekeurd', ChoiceType::class, [
                    'choices' => ['In Behandeling' => 'behandeling', 'Goedgekeurd' => 'goedgekeurd', 'Afgekeurd' => 'afgekeurd'],
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Urenverantwoording::class,
        ]);
    }
}
