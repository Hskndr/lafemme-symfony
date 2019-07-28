<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PublicationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextareaType::class, array(
                'label' => 'Message ',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('image', FileType::class, array(
                'label' => 'Picture',
                'required' => false,
                'data_class' => null,
                'attr' => array(
                    'class' => 'form-control-image'
                )
            ))
            ->add('document', FileType::class, array(
                'label' => 'Document',
                'required' => false,
                'data_class' => null,
                'attr' => array(
                    'class' => 'form-control-document'
                )
            ))
            ->add('Send', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-info"
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\Publication'
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
