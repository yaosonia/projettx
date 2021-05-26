<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EleveType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
           ->add('nom', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'nom', "autocomplete"=>"off", 'placeholder' => 'Nom*')))
           ->add('prenom', TextType::class, array('required' => TRUE, 'attr' => array('class' => 'form-control', 'name'=>'prenom', "autocomplete"=>"off", 'placeholder' => 'Prenom*')))
           ->add('sexe',ChoiceType::class,array(
                'choices'  => array(
                    'Feminin' => 'Feminin',
                    'Masculin' => 'Masculin',
                ),
                'attr'=>array(
                    'placeholder'=>"Sexe" ,) 
                ))
           ->add('datenais', TextType::class, array(
                'attr' => array(
                    'class' => 'datepicker',
                    'data-provide' => 'datepicker',                               
                    'format' => 'dd-mm-yyyy'),
            )) 

            ->add('parents',EntityType::class, array(
                'class'=>'UserBundle:Parents',
                'choice_label'=>'nom',
                'placeholder'=>"Nom du parent"));
          
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Eleve'
        ));
    }
}
