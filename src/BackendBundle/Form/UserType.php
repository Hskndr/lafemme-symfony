<?php

namespace BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role')
            ->add('email')
            ->add('name')
            ->add('surname')
            ->add('nick')
            ->add('password')
            ->add('relationmatch')
            ->add('invitationcode')
            ->add('gender')
            ->add('country')
            ->add('state')
            ->add('postalcode')
            ->add('datebirth')
            ->add('age')
            ->add('zodiacsing')
            ->add('race')
            ->add('lookingfor')
            ->add('bodytype')
            ->add('height')
            ->add('weight')
            ->add('credits')
            ->add('coloreyes')
            ->add('colorhair')
            ->add('hairlength')
            ->add('tatoos')
            ->add('bio')
            ->add('active')
            ->add('image');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'backendbundle_user';
    }


}
