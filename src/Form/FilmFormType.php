<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FilmFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('resume', TextareaType::class,array('attr' => array('rows' => '10', 'cols' => '100')))
            ->add('anneeProduction')
            ->add('realisateur')
            ->add('listeActeurs')
            ->add('imageURL', FileType::class, array('label' => 'Image (jpg file)'))
            ->add('genre')
            ->add('save', SubmitType::class, ['label' => 'Créer un film'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
