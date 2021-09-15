<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Le nom du patient'
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Le prenom du patient'
            ])
            ->add('date_de_naissance', TextType::class, [
                'label' => 'Date de naissance du patient'
            ])
            ->add('lieu_de_naissance', TextType::class, [
                'label' => 'Lieu de naissance du patient'
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Numéro de téléphone du patient'
            ])
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
