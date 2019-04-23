<?php
// src/AppBundle/Form/RegistrationType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam', null, array('label' => 'Naam'))
            ->add('tussenvoegsel', null, array('label' => 'Tussenvoegsel'))
            ->add('achternaam', null, array('label' => 'Achternaam'))
            ->add('geboortedatum', null, array('label' => 'Geboortedatum', 'years' => range(date('Y'), date('Y') - 45),))
            ->add('telefoonnr', null, array('label' => 'Telefoonnummer'))
            ->add('adres', null, array('label' => 'Adres'))
            ->add('achternaam', null, array('label' => 'Achternaam'))
            ->add('postcode', null, array('label' => 'Postcode'))
            ->add('plaats', null, array('label' => 'Plaats'))
            ->add('profielfoto', null, array('label' => 'Profielfoto'))
            ->add('idkaartnummer', null, array('label' => 'IDkaart Nummer'))
            ->add('iban', null, array('label' => 'IBAN'))
            ->add('facebook', null, array('label' => 'Facebook'))
            ->add('linkedin', null, array('label' => 'LinkedIn'));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}