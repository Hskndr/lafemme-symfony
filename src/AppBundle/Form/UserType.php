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
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nick', TextType::class, array(
                'label' => 'Username',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-nick-edit form-control'
                )
            ))

            ->add('name', TextType::class, array(
                'label' => 'Name',
                'required' => false,
                'attr' => array(
                    'class' => 'form-name-edit form-control'
                )
            ))
            ->add('surname', TextType::class, array(
                'label' => 'Sur Name',
                'required' => false,
                'attr' => array(
                    'class' => 'form-surname-edit form-control'
                )
            ))
            ->add('country', TextType::class, array(
                'label' => 'Country',
                'required' => false,
                'attr' => array(
                    'class' => 'form-country-edit form-control'
                )
            ))
            ->add('state', TextType::class, array(
                'label' => 'State',
                'required' => false,
                'attr' => array(
                    'class' => 'form-state-edit form-control'
                )
            ))
            ->add('postalcode', TextType::class, array(
                'label' => 'Postal Zip Code',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-postal-edit form-control'
                )
            ))
            ->add('datebirth', BirthdayType::class, array(
                'label' => 'Date of Birth',
                'required' => 'required',
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                ],
                'attr' => array(
                    'class' => 'form-date-edit form-control'
                )
            ))
            ->add('race', ChoiceType::class, array(
                'label' => 'Race / Ethnic',
                'choices' => [
                    'Please Select' => 'select',
                    'Asian' => 'asian',
                    'Black/African' => 'black-african',
                    'Caucasian' => 'caucasian',
                    'Hispanic/Latino' => 'hispanic-Latino',
                    'Native American' => 'native-american',
                    'Pacific Islander' => 'pacific-islander',
                    'Mixed Race' => 'mixed-race',
                    'Other' => 'other',

                ],
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-race-edit form-control'
                )
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-email-edit form-control'
                )
            ))
            ->add('bio', TextareaType::class, array(
                'label' => 'Bio ',
                'required' => false,
                'attr' => array(
                    'class' => 'form-bio-edit form-control'
                )
            ))
            ->add('image', FileType::class, array(
                'label' => 'Avatar',
                'required' => false,
                'data_class' => null,
                'attr' => array(
                    'class' => 'form-avatar-edit form-control'
                )
            ))
//            OTHER FIELDS

            ->add('lookingfor', ChoiceType::class, array(
                'label' => 'Looking For',
                'choices' => [
                    'Limits' => 'limits',
                    'SomethingShortTerm' => 'something-short-term',
                    'SomethingLongTerm' => 'something-long-term',
                    'CyberAffair/EroticChat' => 'cyber-affair-erotic-chat',
                    'WhateverExcitesMe' => 'whatever-excites-me',
                    'AnythingGoes' => 'anything-goes',
                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-lookingfor-edit form-control'
                )
            ))
            ->add('bodytype', ChoiceType::class, array(
                'label' => 'Body Type',
                'choices' => [
                    'Ask me' => 'ask-me',
                    'Slim' => 'slim',
                    'Fit' => 'fit',
                    'Muscular' => 'muscular',
                    'Average/medium' => 'average-medium',
                    'Shapely toned' => 'shapely-toned',
                    'A few extra pounds' => 'extra-pounds',
                    'Full sized' => 'full-sized',
                    'Zaftig (Voluptuous/Curvy)' => 'zaftig-voluptuous-curvy)',
                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-bodytype-edit form-control'
                )
            ))
            ->add('zodiacsing', ChoiceType::class, array(
                'label' => 'Zodiac Sign',
                'choices' => [
                    'Please Select' => 'select',
                    'Aries' => 'aries',
                    'Taurus' => 'taurus',
                    'Gemini' => 'gemini',
                    'Cancer' => 'cancer',
                    'Leo' => 'leo',
                    'Virgo' => 'virgo',
                    'Libra' => 'libra',
                    'Scorpio' => 'scorpio',
                    'Sagittarius' => 'sagittarius',
                    'Capricorn' => 'capricorn',
                    'Aquarius' => 'aquarius',
                    'Pisces' => 'pisces',
                ],
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-zodiac form-control'
                )
            ))
            ->add('height', ChoiceType::class, array(
                'label' => 'Height',
                'choices' => [
                    'Ask me' => 'ask me ',
                    '4´2´´(1.27m)' => '4´2´´(1.27m)',
                    '4´4´´(1.32m)' => '4´4´´(1.32m)',
                    '4´6´´(1.37m)' => '4´6´´(1.37m)',
                    '4´8´´(1.42m)' => '4´8´´(1.42m)',
                    '4´10´´(1.47m)' => '4´10´´(1.47m)',
                    '5´0´´(1.52m)' => '5´0´´(1.52m)',
                    '5´2´´(1.57m)' => '5´2´´(1.57m)',
                    '5´4´´(1.63m)' => '5´4´´(1.63m)',
                    '5´6´´(1.68m)' => '5´6´´(1.68m)',
                    '5´8´´(1.73m)' => '5´8´´(1.73m)',
                    '5´10´´(1.78m)' => '5´10´´(1.78m)',
                    '6´0´´(1.82m)' => '6´0´´(1.82m)',
                    '6´2´´(1.87m)' => '6´2´´(1.87m)',
                    '6´4´´(1.93m)' => '6´4´´(1.93m)',
                    '6´6´´(1.98m)' => '6´6´´(1.98m)',
                    '6´8´´(2.03m)' => '6´8´´(2.03m)',
                    '6´10´´(2.08m)' => '6´10´´(2.08m)',
                    '7´0´´(2.13m)' => '7´0´´(2.13m)',
                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-height-edit form-control'
                )
            ))
            ->add('weight', ChoiceType::class, array(
                'label' => 'weight',
                'choices' => [
                    'Ask me' => 'ask-me',
                    '80 lbs (36 kg)' => '80 lbs (36 kg)',
                    '85 lbs (38 kg)' => '85 lbs (38 kg)',
                    '90 lbs (40 kg)' => '90 lbs (40 kg)',
                    '95 lbs (43 kg)' => '95 lbs (43 kg)',
                    '100 lbs (45 kg) ' => '100 lbs (45 kg)',
                    '105 lbs (47 kg' => ' 105 lbs (47 kg)',
                    '110 lbs (49 kg)' => '110 lbs (49 kg)',
                    '115 lbs (52 kg)' => '115 lbs (52 kg)',
                    '120 lbs (54 kg)' => '120 lbs (54 kg)',
                    '125 lbs (56 kg)' => '125 lbs (56 kg)',
                    '130 lbs (58 kg)' => '130 lbs (58 kg)',
                    '135 lbs (61 kg)' => '135 lbs (61 kg)',
                    '140 lbs (63 kg)' => '140 lbs (63 kg)',
                    '145 lbs (65 kg)' => '145 lbs (65 kg)',
                    '150 lbs (68 kg)' => '150 lbs (68 kg)',
                    '155 lbs (70 kg)' => '155 lbs (70 kg)',
                    '160 lbs (72 kg)' => '160 lbs (72 kg)',
                    '165 lbs (74 kg)' => '165 lbs (74 kg)',
                    '170 lbs (77 kg)' => '170 lbs (77 kg)',
                    '175 lbs (79 kg)' => '175 lbs (79 kg)',
                    '180 lbs (81 kg)' => '180 lbs (81 kg)',
                    '185 lbs (83 kg)' => '185 lbs (83 kg)',
                    '190 lbs (86 kg)' => '190 lbs (86 kg)',
                    '195 lbs (88 kg)' => '195 lbs (88 kg)',
                    '200 lbs (90 kg)' => '200 lbs (90 kg)',
                    '205 lbs (92 kg)' => '205 lbs (92 kg)',
                    '210 lbs (95 kg)' => '210 lbs (95 kg)',
                    '215 lbs (97 kg)' => '215 lbs (97 kg)',
                    '220 lbs (99 kg)' => '220 lbs (99 kg)',
                    '225 lbs (102 kg)' => '225 lbs (102 kg)',
                    '230 lbs (104 kg)' => '230 lbs (104 kg)',
                    '235 lbs (106 kg)' => '235 lbs (106 kg)',
                    '240 lbs (108 kg)' => '240 lbs (108 kg)',
                    '245 lbs (111 kg)' => '245 lbs (111 kg)',
                    '250 lbs (113 kg)' => '250 lbs (113 kg)',
                    '255 lbs (115 kg)' => '255 lbs (115 kg)',
                    '260 lbs (117 kg)' => '260 lbs (117 kg)',
                    '265 lbs (120 kg)' => '265 lbs (120 kg)',
                    '270 lbs (122 kg)' => '270 lbs (122 kg)',
                    '275 lbs (124 kg)' => '275 lbs (124 kg)',
                    '280 lbs (127 kg)' => '280 lbs (127 kg)',
                    '285 lbs (129 kg)' => '285 lbs (129 kg)',
                    '290 lbs (131 kg)' => '290 lbs (131 kg)',
                    '295 lbs (133 kg)' => '295 lbs (133 kg)',
                    '300 lbs (136 kg)' => '300 lbs (136 kg)',

                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-height-edit form-control'
                )
            ))
            ->add('coloreyes', ChoiceType::class, array(
                'label' => 'Color Eyes',
                'choices' => [
                    'Amber' => 'amber',
                    'Blue' => 'blue',
                    'Brown' => 'brown',
                    'Green' => 'green',
                    'Hazel' => 'hazel',
                    'Other' => 'other',
                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-eyes-color-edit form-control'
                )
            ))
            ->add('colorhair', ChoiceType::class, array(
                'label' => 'Hair Color',
                'choices' => [
                    'Black' => 'black',
                    'Blonde' => 'blonde',
                    'Brown' => 'brown',
                    'Red' => 'red',
                    'White' => 'white',
                    'Other' => 'other',

                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-hair-color-edit form-control'
                )
            ))
            ->add('hairlength', ChoiceType::class, array(
                'label' => 'Hair Lenght',
                'choices' => [
                    'Long' => 'long',
                    'Medium' => 'medium',
                    'Short' => 'short',

                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-hair-lenght-edit form-control'
                )
            ))
            ->add('tatoos', ChoiceType::class, array(
                'label' => 'Tattoos',
                'choices' => [
                    'Yes' => 'yes',
                    'No' => 'no',

                ],
                'required' => false,
                'attr' => array(
                    'class' => 'form-tattoo-edit form-control'
                )
            ))

            ->add('relationmatch', CHoiceType::class, [
                'label' => 'CHOOSE RELATIONSHIP',
                'choices' => [
                    'Please Select' => 'select',
                    'Male' => [
                        'Attached Male Seeking Female' => 'Attached Male Seeking Female',
                        'Male seeking Males' => 'Male seeking Males',
                        'Sugar Daddies Seeking Females' => 'Sugar Daddies Seeking Females',
                        'Male Seeking Sugar Mommies' => 'Male Seeking Sugar Mommies',
                    ],
                    'female' => [
                        'Attached Female Seeking Male' => 'Attached Female Seeking Male',
                        'Female seeking Females' => 'Female seeking Females',
                        'Sugar Mommies Seeking Males' => 'Sugar Mommies Seeking Males',
                        'Female Seeking Sugar Daddies' =>  'Female Seeking Sugar Daddies',
                    ],
                ],
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-relation-edit form-control'
                )
            ])
            ->add('age', TextType::class, array(
                'label' => 'Age',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-age form-control'
                )
            ))
            ->add('Save', SubmitType::class, array(
                "attr" => array(
                    "class" => "form-submit btn btn-info"
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
