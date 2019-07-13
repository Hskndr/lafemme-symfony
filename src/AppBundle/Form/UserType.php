<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nick', TextType::class, array(
                'label' => 'Nick',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-nick form-control '
                )
            ))
            ->add('name', TextType::class, array(
                'label' => 'Name',
                'required' => false,
                'attr' => array(
                    'class' => 'form-name form-control '
                )
            ))
            ->add('surname', TextType::class, array(
                'label' => 'Sur Name',
                'required' => false,
                'attr' => array(
                    'class' => 'form-surname form-control '
                )
            ))
            ->add('country', TextType::class, array(
                'label' => 'Country',
                'required' => false,
                'attr' => array(
                    'class' => 'form-country form-control'
                )
            ))
            ->add('state', TextType::class, array(
                'label' => 'State',
                'required' => false,
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

            ->add('race', TextType::class, array(
                'label'=>'Race / Ethnic',
                'required'=>false,
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
            ->add('bio', TextareaType::class, array(
                'label' => 'Bio ',
                'required' => false,
                'attr' => array(
                    'class' => 'form-bio form-control'
                )
            ))
            ->add('image', FileType::class, array(
                'label' => 'Avatar',
                'required' => false,
                'data_class' => null,
                'attr' => array(
                    'class' => 'form-avatar form-control'
                )
            ))

//            OTHER FIELDS

            ->add('lookingfor', TextType::class, array(
                'label' => 'Looking For  And Add the others',
                'required' => false,
                'attr' => array(
                    'class' => 'form-lookingfor form-control '
                )
            ))


            ->add('Save', SubmitType::class, array(
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
