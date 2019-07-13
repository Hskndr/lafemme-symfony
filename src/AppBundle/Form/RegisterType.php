<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegisterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('relationmatch', CHoiceType::class, [
                'label' => 'CHOOSE RELATIONSHIP',
                'choices' => [
                    'Please Select' => 'select',
                    'Male' => [
                        'Attached Male Seeking Female' => 'attached_male',
                        'Male seeking Males' => 'male_males',
                        'Sugar Daddies Seeking Females' => 'sugar_daddies',
                        'Male Seeking Sugar Mommies' => 'male_sugarMommies',
                    ],
                    'female' => [
                        'Attached Female Seeking Male' => 'attached_female',
                        'Female seeking Females' => 'female_females',
                        'Sugar Mommies Seeking Males' => 'sugar_mommies',
                        'Female Seeking Sugar Daddies' => 'female_sugarDaddies',
                    ],
                ],
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-relation form-control'
                )
            ])
            ->add('invitationcode', TextType::class, array(
                'label' => 'Invitation ID Code',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-invitation form-control'
                )

            ))
            ->add('nick', TextType::class, array(
                'label' => 'Nick',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-nick form-control nick-input'
                )
            ))
            ->add('password', PasswordType::class, array(
                'label' => 'Password',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-password form-control'
                )
            ))
            ->add('country', TextType::class, array(
                'label' => 'Country',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-country form-control'
                )
            ))
            ->add('state', TextType::class, array(
                'label' => 'State',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-state form-control'
                )
            ))
            ->add('postalcode', TextType::class, array(
                'label' => 'Postal Zip Code',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-postal form-control'
                )
            ))
            ->add('datebirth', TextType::class, array(
                'label' => 'Date of Birth',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-date form-control'
                )
            ))
            ->add('age', TextType::class, array(
                'label' => 'Age',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-age form-control'
                )
            ))
            ->add('zodiacsing', TextType::class, array(
                'label' => 'Zodiac Sign',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-zodiac form-control'
                )
            ))
            ->add('race', TextType::class, array(
                'label'=>'Race / Ethnic',
                'required'=>'required',
                'attr' => array(
                    'class' => 'form-race form-control'
                )
            ))
            ->add('email', EmailType::class, array(
                'label'=>'Email',
                'required'=>'required',
                'attr' => array(
                    'class' => 'form-email form-control'
                )
            ))
            ->add('Signin', SubmitType::class, array(
                "attr" => array(
                    "class" => "form-submit btn btn-success"
                )
            ));
    }

    /**
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
