<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BuyCreditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('planA', CheckboxType::class, array(
                'label' => 'Plan A: 1200 Credits',
                'required' => 'false',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('planB', CheckboxType::class, array(
                'label' => 'Plan B: 500 Credits',
                'required' => 'false',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('planC', CheckboxType::class, array(
                'label' => 'Plan C: 200 Credits',
                'required' => 'false',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
 /*           ->add('cardVisa', CheckboxType::class, array(
                'label' => 'Visa',
                'required' => 'false',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('cardMaster', CheckboxType::class, array(
                'label' => 'Mastercard',
                'required' => 'false',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('cardAmex', CheckboxType::class, array(
                'label' => 'Amex',
                'required' => 'false',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('cardDiscover', CheckboxType::class, array(
                'label' => 'Discover',
                'required' => 'false',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('cardNumber', TextareaType::class, array(
                'label' => 'Card Number ',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('expiration', DateType::class, array(
                'label' => 'Expiration date:',
                'required' => 'required',
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month',
                ],
                'attr' => array(
                    'class' => 'form-date form-control'
                )
            ))*/
            ->add('Submit', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-warning"
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\BuyCredit'
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
